<?php

namespace App\Models;

use App\Http\Resources\CountyResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    public static function getAllCounties(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $counties = self::all();
        return CountyResource::collection($counties);
    }

    public static function getallCountiesArray(): array
    {
        return [
            'Έβρου', 'Ροδόπης', 'Ξάνθης', 'Δράμας', 'Καβάλας', 'Θεσσαλονίκης', 'Χαλκιδικής', 'Ημαθίας', 'Κιλκίς', 'Πέλλας', 'Πιερίας', 'Σερρών', 'Κοζάνης', 'Φλώρινας', 'Γρεβενών', 'Καστοριάς', 'Ιωαννίνων', 'Άρτας', 'Πρέβεζας', 'Θεσπρωτίας', 'Λάρισας', 'Καρδίτσας', 'Μαγνησίας', 'Τρικάλων', 'Βοιωτίας', 'Ευβοίας', 'Ευρυτανίας', 'Φωκίδας', 'Φθιώτιδας', 'Κεφαλληνίας', 'Κέρκυρας', 'Λευκάδας', 'Ζακύνθου', 'Αχαΐας', 'Ηλείας', 'Αιτωλοακαρνανίας', 'Αρκαδίας', 'Αργολίδας', 'Κορινθίας', 'Λακωνίας', 'Μεσσηνίας', 'Αθηνών', 'Ανατολικής Αττικής', 'Πειραιώς', 'Δυτικής Αττικής', 'Χίου', 'Λέσβου', 'Σάμου', 'Κυκλάδων', 'Δωδεκανήσου', 'Ηρακλείου', 'Χανίων', 'Λασιθίου', 'Ρεθύμνης', 'Άγιο Όρος'
        ];
    }
}
