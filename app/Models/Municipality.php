<?php

namespace App\Models;

use App\Http\Resources\MunicipalityResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    public static function getAllMunicipalities(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $municipalities = self::all();
        return MunicipalityResource::collection($municipalities);
    }

    public static function getAllMunicipalitiesArray(): array
    {
        return [
            "Ορεστιάδας",
            "Διδυμοτείχου",
            "Σουφλίου",
            "Αλεξανδρούπολης",
            "Σαμοθράκης",
            "Αρριανών",
            "Μαρωνείας-Σαπών",
            "Κομοτηνής",
            "Ιάσμου",
            "Αβδήρων",
            "Μύκης",
            "Ξάνθης",
            "Τοπείρου",
            "Νέστου",
            "Καβάλας",
            "Παγγαίου",
            "Θάσου",
            "Δοξάτου",
            "Παρανεστίου",
            "Δράμας",
            "Προσοτσάνης",
            "Κάτω Νευροκοπίου",
            "Νέας Ζίχνης",
            "Αμφίπολης",
            "Βισαλτίας",
            "Εμμανουήλ Παππά",
            "Σερρών",
            "Ηράκλειας",
            "Σιντικής",
            "Κιλκίς",
            "Παιονίας",
            "Χαλκηδόνος",
            "Δέλτα",
            "Ωραιοκάστρου",
            "Παύλου Μελά",
            "Αμπελοκήπων-Μενεμένης",
            "Κορδελιού-Ευόσμου",
            "Νεάπολης-Συκεών",
            "Θεσσαλονίκης",
            "Καλαμαριάς",
            "Θερμαϊκού",
            "Θέρμης",
            "Πυλαίας-Χορτιάτη",
            "Λαγκαδά",
            "Βόλβης",
            "Αριστοτέλη",
            "Σιθωνίας",
            "Πολύγυρου",
            "Κασσάνδρας",
            "Νέας Προποντίδας",
            "Δίου-Ολύμπου",
            "Κατερίνης",
            "Πύδνας-Κολινδρού",
            "Αλεξάνδρειας",
            "Βέροιας",
            "Ηρωικής Πόλεως Νάουσας",
            "Πέλλας",
            "Σκύδρας",
            "Έδεσσας",
            "Αλμωπίας",
            "Αμυνταίου",
            "Φλώρινας",
            "Πρεσπών",
            "Καστοριάς",
            "Νεστόριου",
            "Άργους Ορεστικού",
            "Εορδαίας",
            "Κοζάνης",
            "Βοΐου",
            "Βελβεντού",
            "Σερβίων",
            "Δεσκάτης",
            "Γρεβενών",
            "Κόνιτσας",
            "Πωγωνίου",
            "Ζαγορίου",
            "Ζίτσας",
            "Ιωαννιτών",
            "Μετσόβου",
            "Βορείων Τζουμέρκων",
            "Δωδώνης",
            "Σουλίου",
            "Φιλιατών",
            "Ηγουμενίτσας",
            "Πάργας",
            "Πρέβεζας",
            "Ζηρού",
            "Αρταίων",
            "Νικόλαου Σκουφά",
            "Γεωργίου Καραϊσκάκη",
            "Κεντρικών Τζουμέρκων",
            "Πύλης",
            "Μετεώρων",
            "Τρικκαίων",
            "Φαρκαδόνος",
            "Παλαμά",
            "Μουζακίου",
            "Σοφάδων",
            "Αργιθέας",
            "Λίμνης Πλαστήρα",
            "Καρδίτσας",
            "Ελασσόνας",
            "Τυρνάβου",
            "Τεμπών",
            "Λάρισας",
            "Αγιάς",
            "Κιλελέρ",
            "Φαρσάλων",
            "Ρήγα Φεραίου",
            "Αλμυρού",
            "Βόλου",
            "Ζαγοράς-Μουρεσίου",
            "Νοτίου Πηλίου",
            "Σκιάθου",
            "Σκοπέλου",
            "Αλοννήσου",
            "Σκύρου",
            "Ιστιαίας - Αιδηψού",
            "Μαντουδίου-Λίμνης-Αγίας Άννας",
            "Διρφύων-Μεσσαπίων",
            "Χαλκιδέων",
            "Ερέτριας",
            "Κύμης-Αλιβερίου",
            "Καρύστου",
            "Τανάγρας",
            "Θηβαίων",
            "Αλιάρτου",
            "Ορχομενού",
            "Λεβαδέων",
            "Διστόμου-Αράχοβας-Αντίκυρας",
            "Λοκρών",
            "Αμφίκλειας-Ελάτειας",
            "Καμένων Βούρλων",
            "Λαμιέων",
            "Στυλίδας",
            "Μακρακώμης",
            "Δομοκού",
            "Δελφών",
            "Δωρίδος",
            "Καρπενησίου",
            "Αγράφων",
            "Αμφιλοχίας",
            "Ακτίου-Βόνιτσας",
            "Ξηρομέρου",
            "Ιεράς Πόλεως Μεσολογγίου",
            "Αγρινίου",
            "Θέρμου",
            "Ναυπακτίας",
            "Πατρέων",
            "Αιγιαλείας",
            "Καλαβρύτων",
            "Ερυμάνθου",
            "Δυτικής Αχαΐας",
            "Ανδραβίδας - Κυλλήνης",
            "Πηνειού",
            "Ήλιδας",
            "Πύργου",
            "Αρχαίας Ολυμπίας",
            "Ανδρίτσαινας - Κρεστένων",
            "Ζαχάρως",
            "Κεντρικής Κέρκυρας και Διαποντίων Νήσων",
            "Βόρειας Κέρκυρας",
            "Νότιας Κέρκυρας",
            "Παξών",
            "Λευκάδας",
            "Μεγανησίου",
            "Ιθάκης",
            "Αργοστολίου",
            "Ληξουρίου",
            "Σάμης",
            "Ζακύνθου",
            "Κυθήρων",
            "Σπετσών",
            "Ύδρας",
            "Τροιζηνίας - Μεθάνων",
            "Πόρου",
            "Αγκιστρίου",
            "Αίγινας",
            "Σαλαμίνας",
            "Περάματος",
            "Κερατσινίου - Δραπετσώνας",
            "Πειραιά",
            "Νίκαιας - Αγίου Ιωάννη Ρέντη",
            "Κορυδαλλού",
            "Αγίας Βαρβάρας",
            "Χαϊδαρίου",
            "Αιγάλεω",
            "Περιστερίου",
            "Πετρούπολης",
            "Ιλίου",
            "Αγίων Αναργύρων - Καματερού",
            "Νέας Φιλαδέλφειας - Νέας Χαλκηδόνας",
            "Γαλατσίου",
            "Αθηναίων",
            "Δάφνης - Υμηττού",
            "Ηλιούπολης",
            "Βύρωνος",
            "Καισαριανής",
            "Ζωγράφου",
            "Παπάγου-Χολαργού",
            "Αγίας Παρασκευής",
            "Χαλανδρίου",
            "Βριλησσίων",
            "Αμαρουσίου",
            "Φιλοθέης-Ψυχικού",
            "Νέας Ιωνίας",
            "Μεταμορφώσεως",
            "Ηρακλείου",
            "Λυκόβρυσης-Πεύκης",
            "Κηφισιάς",
            "Πεντέλης",
            "Μοσχάτου-Ταύρου",
            "Καλλιθέας",
            "Νέας Σμύρνης",
            "Παλαιού Φαλήρου",
            "Αγίου Δημητρίου",
            "Αλίμου",
            "Ελληνικού-Αργυρούπολης",
            "Γλυφάδας",
            "Βάρης - Βούλας - Βουλιαγμένης",
            "Κρωπίας",
            "Σαρωνικού",
            "Λαυρεωτικής",
            "Μαρκόπουλου Μεσογαίας",
            "Παιανίας",
            "Σπάτων-Αρτέμιδος",
            "Παλλήνης",
            "Ραφήνας-Πικερμίου",
            "Μαραθώνος",
            "Διονύσου",
            "Ωρωπού",
            "Αχαρνών",
            "Φυλής",
            "Ασπροπύργου",
            "Ελευσίνας",
            "Μάνδρας-Ειδυλλίας",
            "Μεγαρέων",
            "Λουτρακίου-Περαχώρας-Αγίων Θεοδώρων",
            "Κορινθίων",
            "Βέλου-Βόχας",
            "Σικυωνίων",
            "Ξυλοκάστρου-Ευρωστίνης",
            "Νεμέας",
            "Άργους-Μυκηνών",
            "Ναυπλιέων",
            "Επιδαύρου",
            "Ερμιονίδας",
            "Νότιας Κυνουρίας",
            "Βόρειας Κυνουρίας",
            "Τρίπολης",
            "Γορτυνίας",
            "Μεγαλόπολης",
            "Οιχαλίας",
            "Τριφυλίας",
            "Πύλου - Νέστορος",
            "Μεσσήνης",
            "Καλαμάτας",
            "Δυτικής Μάνης",
            "Ανατολικής Μάνης",
            "Σπάρτης",
            "Ευρώτα",
            "Μονεμβασιάς",
            "Ελαφονήσου",
            "Λήμνου",
            "Αγίου Ευστρατίου",
            "Δυτικής Λέσβου",
            "Μυτιλήνης",
            "Ηρωικής Νήσου Ψαρών",
            "Οινουσσών",
            "Χίου",
            "Ανατολικής Σάμου",
            "Δυτικής Σάμου",
            "Φούρνων Κορσεών",
            "Ικαρίας",
            "Άνδρου",
            "Τήνου",
            "Κέας",
            "Κύθνου",
            "Σύρου - Ερμούπολης",
            "Μυκόνου",
            "Σερίφου",
            "Σίφνου",
            "Κιμώλου",
            "Μήλου",
            "Αντιπάρου",
            "Πάρου",
            "Νάξου & Μικρών Κυκλάδων",
            "Αμοργού",
            "Ιητών",
            "Σικίνου",
            "Φολεγάνδρου",
            "Θήρας",
            "Ανάφης",
            "Αγαθονησίου",
            "Πάτμου",
            "Λειψών",
            "Λέρου",
            "Καλυμνίων",
            "Αστυπάλαιας",
            "Κω",
            "Νισύρου",
            "Τήλου",
            "Σύμης",
            "Ρόδου",
            "Χάλκης",
            "Μεγίστης",
            "Καρπάθου",
            "Ηρωικής Νήσου Κάσου",
            "Σητείας",
            "Ιεράπετρας",
            "Αγίου Νικολάου",
            "Οροπεδίου Λασιθίου",
            "Βιάννου",
            "Μινώα Πεδιάδας",
            "Αρχανών - Αστερουσίων",
            "Χερσονήσου",
            "Ηρακλείου",
            "Μαλεβιζίου",
            "Γόρτυνας",
            "Φαιστού",
            "Ανωγείων",
            "Μυλοποτάμου",
            "Αμαρίου",
            "Αγίου Βασιλείου",
            "Ρεθύμνης",
            "Αποκορώνου",
            "Χανίων",
            "Πλατανιά",
            "Κισσάμου",
            "Καντάνου - Σελίνου",
            "Σφακίων",
            "Γαύδου"
        ];
    }
}