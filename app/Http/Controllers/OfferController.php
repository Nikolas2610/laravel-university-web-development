<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\County;
use App\Models\Fuel;
use App\Models\Municipality;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;


class OfferController extends Controller
{
    public function importPage()
    {
        // Get form select data from DB
        $counties = County::getAllCounties();
        $municipalities = Municipality::getAllMunicipalities();
        $fuels = Fuel::getAllFuels();

        $data = [
            'counties' => $counties,
            'municipality' => $municipalities,
            'fuel' => $fuels
        ];

//      Return the view if the page with the data
        return view('import', $data);
    }

    public function searchPage(Request $request)
    {
        $fuel = $request->input('fuel');
        $county = $request->input('county');

        // Fetch all offers if no filters are applied
        if (!$fuel && !$county) {
            $offers = Offer::orderBy('amount')->get();
        } else {
            // Fetch offers based on input values
            $offers = Offer::when($fuel, function ($query, $fuel) {
                                return $query->where('fuel_id', $fuel);
                            })
                            ->when($county, function ($query, $county) {
                                return $query->where('county_id', $county);
                            })
                            ->orderBy('amount')
                            ->get();
        }

        $today = date('Y-m-d');
        $averageAmount = Offer::where('expire_date', '>=', $today)
            ->avg('amount');

        $greenOfferId = Offer::where('expire_date', '>=', $today)
            ->where('amount', '<', $averageAmount)
            ->orderBy('amount', 'desc')
            ->value('id');

        // Get form select data from DB
        $counties = County::getAllCounties();
        $fuels = Fuel::getAllFuels();

        $data = [
            'counties' => $counties,
            'fuels' => $fuels,
            'offers' => $offers,
            'greenOfferId' => $greenOfferId
        ];

//      Return the view if the page with the data
        return view('search', $data);
    }

    public function importOffer(OfferRequest $request)
    {
        try {
            $id = session('user_id');
            if (!isset($id)) {
                throw new \Exception('Πρέπει να συνδεθείτε με την πλατφόρμα για να καταχωρήσετε προσφορά');
            }

            $user = User::find($id);
            if (!isset($user->id)) {
                throw new \Exception('Αυτός ο χρήστης δεν ανήκει στην πλατφόρμα');
            }

            $validated = $request->validated();
            if ($user->name !== $validated['name']) {
                throw new \Exception('Το όνομα εταιρείας που πληκρολογήσατε δεν ανήκει στα στοιχεία της εγγραφής σας!');
            }
            if ($user->afm !== (int)$validated['afm']) {
                throw new \Exception('Το ΑΦΜ που πληκτολογήσατε δεν ανήκει στα στοιχεία της εγγραφής σας!');
            }

            $previousOffer = Offer::where('afm', (int)$validated['afm'])
                ->where('fuel_id', (int)$validated['fuel'])
                ->first();

            if (isset($previousOffer->id)) {
                $previousOffer->expire_date = $validated['expire_date'];
                $previousOffer->amount = $validated['amount'];
                $previousOffer->save();

                $fuel = Fuel::find($previousOffer->fuel_id);

                return redirect()->route('import')->with([
                    'type' => 'success',
                    'message' => "Η προσφορά σας για τύπο πετρελαίου $fuel->name, έχει ανανεωθεί."
                ]);
            }

            Offer::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'afm' => (int)$validated['afm'],
                'address' => $validated['address'],
                'municipality_id' => (int)$validated['municipality'],
                'county_id' => (int)$validated['county'],
                'fuel_id' => (int)$validated['fuel'],
                'amount' => $validated['amount'],
                'expire_date' => $validated['expire_date']
            ]);

            $fuel = Fuel::find($validated['fuel']);

            return redirect()->route('import')->with([
                'type' => 'success',
                'message' => "Η προσφορά σας για τύπο πετρελαίου $fuel->name, έχει καταχωτηθεί."
            ]);
        } catch (\Exception $e) {
            return redirect()->route('import')->with([
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }
}
