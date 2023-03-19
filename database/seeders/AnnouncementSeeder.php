<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Announcements;

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

        for ($i = 0; $i < 50; $i++) {
            Announcements::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph
            ]);
        }
    }
}
