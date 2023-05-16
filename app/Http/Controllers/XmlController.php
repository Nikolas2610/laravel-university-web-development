<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use App\Models\User;
use DOMDocument;
use XSLTProcessor;


class XmlController extends Controller
{
    public function downloadXml()
    {
        try {
            // Δημιουργία του XML αρχείου 
            $content = $this->generateXml();

            // Ορίζουμε το όνομα του αρχείου και τον προορισμός αποθήκευσης
            $filename = "xml/data.xml";

            // Αποθηκεύουμε το αρχείο XML
            Storage::put($filename, $content);

            // Φορτώνουμε το αρχείο XML
            $xml = new DOMDocument();
            $xml->load(storage_path('app/' . $filename));

            // Ελέγχουμε αν είναι οθή η δομή του XML αρχείου με το ανάλογο DTD αρχείο του 
            if ($xml->validate()) {
                // Αν είναι εντάξει η δομή του αρχείου επιστρέφουμε το αρχείο και το διαγράφουμε στην συνέχεια
                return response()
                    ->download(Storage::path($filename))
                    ->deleteFileAfterSend(true);
            }

            // Αν δεν είναι εντάξει το XML επιστρέφουμε μήνυμα αποτυχίας
            throw new \Exception('XML validation against DTD failed.');
        } catch (\Exception $e) {
            return redirect()->route('import')->with([
                'type' => 'danger',
                'message' => 'Δεν ήταν εφικτή η δημιουργία του XML αρχείου για τις προσφορές σας. Παρακαλώ δοκιμάστε αργότερα.'
            ]);
        }
    }

    private function generateXml($xsl = false)
    {
        $id = session('user_id');
        $user = User::select('users.*', 'municipalities.name as municipality_name', 'counties.name as county_name')
            ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
            ->join('counties', 'users.county', '=', 'counties.id')
            ->where('users.id', $id)
            ->first();
        $offers = Offer::where('user_id', $user->id)->with('fuel')->get();

        // Create the XML document
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>');

        // Add user data to the XML structure
        $xml = $xml->addChild('company');
        $xml->addChild('company_name', $user->username);
        $xml->addChild('afm', $user->afm);

        $xmlLocation = $xml->addChild('location');
        $xmlLocation->addChild('address', $user->address);
        $xmlLocation->addChild('municipality', $user->municipality_name);
        $xmlLocation->addChild('county', $user->county_name);

        $xmlOffers = $xml->addChild('offers');

        foreach ($offers as $offer) {
            if ($xsl) {
                $fuelType = $offer->fuel->name;
                if (!isset($fuelTypes[$fuelType])) {
                    $fuelTypes[$fuelType] = [
                        'minPrice' => $offer->amount,
                        'maxPrice' => $offer->amount,
                    ];
                } else {
                    if ($offer->amount < $fuelTypes[$fuelType]['minPrice']) {
                        $fuelTypes[$fuelType]['minPrice'] = $offer->amount;
                    }
                    if ($offer->amount > $fuelTypes[$fuelType]['maxPrice']) {
                        $fuelTypes[$fuelType]['maxPrice'] = $offer->amount;
                    }
                }
            }

            $xmlOffer = $xmlOffers->addChild('offer');
            $xmlOffer->addChild('fuel', $offer->fuel->name);
            $xmlOffer->addChild('expire_date', $offer->expire_date);
            $xmlOffer->addChild('amount', $offer->amount);
            $status = $offer->expire_date > date('Y-m-d') ? 'Ενεργή' : 'Ληγμένη';
            $xmlOffer->addChild('status', $status);
        }

        if ($xsl) {
            $xml->addChild('offers_count', sizeof($offers));
            $xmlFuelTypes = $xml->addChild('fuels');

            if (isset($fuelTypes)) {
                foreach ($fuelTypes as $fuelType => $prices) {
                    $xmlFuelType = $xmlFuelTypes->addChild('fuel_stats');
                    $xmlFuelType->addChild('name', $fuelType);
                    $xmlFuelType->addChild('min', $prices['minPrice']);
                    $xmlFuelType->addChild('max', $prices['maxPrice']);
                }
            } else {
                $xmlFuelType = $xmlFuelTypes->addChild('fuel_stats');
                $xmlFuelType->addChild('name', '-');
                $xmlFuelType->addChild('min', 0);
                $xmlFuelType->addChild('max', 0);
            }
        }

        $xmlContent = $xml->asXML();

        // Define the XML declaration with header for the validation
        $xmlDeclaration = '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL;

        $xmlValidateFileCode = '<!DOCTYPE company SYSTEM "../data.dtd">' . PHP_EOL;

        // Add the XSL declaration if required with header for the validation
        if ($xsl) {
            $xslDeclaration = '<?xml-stylesheet type="text/xsl" href="data.xsl"?>' . PHP_EOL;
            $xmlValidateFileCode = '<!DOCTYPE company SYSTEM "../viewXml.dtd">' . PHP_EOL;
            $xmlContent = $xslDeclaration . $xmlContent;
        }

        // Prepend the XML declaration
        $xmlContent = $xmlDeclaration . $xmlValidateFileCode . $xmlContent;

        // Return the modified XML content
        return $xmlContent;
    }

    public function viewXml()
    {
        try {
            // Δημιουργία του XML για XSL 
            $content = $this->generateXml(true);

            // Ορισμός του όνοματος αρχείου και τον προορισμό 
            $filename = "xml/data.xml";

            // Αποθήκευση αρχείου
            Storage::put($filename, $content);

            // Θέτουμε το μονομάτι του XML και XSL αρχείο
            $xml_filename = storage_path('app/xml/data.xml');
            $xsl_filename = storage_path('app/data_format.xsl');

           // Φορτώνουμε το XML και XSL αρχείο
            $xml = new DOMDocument();
            $xml->load($xml_filename);

            // Ελέγχουμε το XML αρχείο μαζί με το DTD του
            if ($xml->validate()) {
                // Φορτώνουμε το XSL αρχείο
                $xsl = new DOMDocument();
                $xsl->load($xsl_filename);

                // Δημιουργούμε XSLTProcessor για να βαλούμε εμφάνιση στο αρχείο
                $proc = new XSLTProcessor();
                $proc->importStyleSheet($xsl);

                // Μεταφράζουμε το XML με βάση το XSL 
                $transformedXml = $proc->transformToXML($xml);

                // Διαγράφουμε το XML αρχείο που δημιουργήθηκε
                Storage::delete($filename);

                // Επιστρέφουμε το αρχείο
                return view('xml', ['transformedXml' => $transformedXml]);
            }

            // Επιστροφή μήνυμα αποτυχίας για το έλεγχο του XML
            throw new \Exception('XML validation against DTD failed.');
        } catch (\Exception $e) {
            // If an exception is caught, redirect to the import route with an error message
            return redirect()->route('import')->with([
                'type' => 'danger',
                'message' => 'Δεν ήταν εφικτή η εφμάνιση των δεδομένων των προσφορών σας. Παρακαλώ δοκιμάστε αργότερα.'
            ]);
        }
    }
}
