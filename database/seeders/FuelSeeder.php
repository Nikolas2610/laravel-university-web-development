<?php

namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuel = Fuel::getAllFuelsArray();

        $fuel = collect($fuel)->map(function ($name) {
            return new Fuel([
                'name' => $name,
            ]);
        });

        Fuel::insert($fuel->toArray());
    }
}
