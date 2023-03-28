<?php

namespace Database\Seeders;

use App\Models\Announcements;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('el_GR');

        $startDate = Carbon::now()->subMonths(2);
        $endDate = Carbon::now()->subMonth();

        $announcements = [
            [
                'title' => 'Νέα προϊόντα βιοκαυσίμων στην αγορά!',
                'content' => 'Προσφέρουν αποδοτική ενέργεια και ελαχιστοποιούν την ρύπανση.'
            ],
            [
                'title' => 'Μείωση τιμών βενζίνης και πετρελαίου κίνησης!',
                'content' => 'Απόλαυσε οικονομία στο καύσιμο του αυτοκινήτου σου.'
            ],
            [
                'title' => 'Προτιμήστε βιομηχανικά καύσιμα με μηδενικές εκπομπές CO2!',
                'content' => 'Συνεισφέρετε στη διατήρηση του περιβάλλοντος.'
            ],
            [
                'title' => 'Νέοι τρόποι ανανεώσιμων καυσίμων για το σπίτι!',
                'content' => 'Πείτε αντίο στο πετρέλαιο και κερδίστε επιπλέον χρήματα.'
            ],
            [
                'title' => 'Προστατέψτε τον κινητήρα σας με προηγμένα καύσιμα καθαρισμού!',
                'content' => 'Εγγυημένα αποτελέσματα στην απομάκρυνση των ρύπων και τη βελτίωση της απόδοσης.'
            ],
            [
                'title' => 'Παραγωγή υδρογόνου για καθαρότερες και αποδοτικότερες ενεργειακές λύσεις!',
                'content' => 'Ανακαλύψτε την υδρογονοκίνηση και μείνετε μπροστά στις ενεργειακές τάσεις.'
            ],
            [
                'title' => 'Βελτιώστε την απόδοση του κινητήρα σας με εξειδικευμένα καύσιμα!',
                'content' => 'Μειώστε την κατανάλωση καυσίμου και αυξήστε την ισχύ του αυτοκινήτου σας.'
            ],
            [
                'title' => 'Παραγωγή βιοκαυσίμων από απόβλητα τροφίμων!',
                'content' => 'Αξιοποιήστε τα απόβλητα και παραγάγετε αποδοτικότερα καύσιμα για τις ενεργειακές σας ανάγκες.'
            ],
            [
                'title' => 'Προσαρμογή των πετρελαιοειδών στις νέες απαιτήσεις της περιβαλλοντικής νομοθεσίας!',
                'content' => 'Μείωση των εκπομπών ρύπων και διατήρηση της ποιότητας του αέρα που αναπνέουμε.'
            ]
        ];

        foreach ($announcements as $announcement) {
            $dates = $faker->dateTimeBetween($startDate, $endDate, 'Europe/Athens');
            Announcements::create([
                'title' => $announcement['title'],
                'content' => $announcement['content'],
                'created_at' => $dates
            ]);

            // Generate a new random date for the next announcement
            $dates = $faker->dateTimeBetween($startDate, $endDate, 'Europe/Athens');
        }
    }
}
