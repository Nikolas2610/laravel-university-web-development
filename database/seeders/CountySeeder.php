<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = County::getallCountiesArray();
        $counties = collect($counties)->map(function ($name) {
            return new County([
                'name' => $name,
            ]);
        });

        County::insert($counties->toArray());
    }
}
