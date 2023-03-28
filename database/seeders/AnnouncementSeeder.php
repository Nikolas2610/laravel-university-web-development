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

        for ($i = 0; $i < 50; $i++) {
            $dates = $faker->dateTimeBetween($startDate, $endDate, 'Europe/Athens');
            Announcements::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'created_at' => $dates
            ]);

            // Generate a new random date for the next announcement
            $dates = $faker->dateTimeBetween($startDate, $endDate, 'Europe/Athens');
        }
    }
}
