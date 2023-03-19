<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = Municipality::getAllMunicipalitiesArray();


        $municipalities = collect($municipalities)->map(function ($name) {
            return new Municipality([
                'name' => $name,
            ]);
        });

        Municipality::insert($municipalities->toArray());
    }
}
