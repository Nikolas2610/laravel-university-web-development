<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(MunicipalitySeeder::class);
        $this->call(CountySeeder::class);
        $this->call(FuelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(AnnouncementSeeder::class);
    }
}
