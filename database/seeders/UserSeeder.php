<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\Fuel;
use App\Models\Municipality;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = County::getallCountiesArray();
        $municipalities = Municipality::getAllMunicipalitiesArray();
        $fuels = Fuel::getAllFuelsArray();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@plh23.com',
            'password' => 'Psyllou-23',
            'address' => 'Παγκράτι',
            'municipality' => 'Κηφισιάς',
            'county' => 'Δράμας',
            'username' => 'admin',
            'fuel' => $fuels[0],
            'afm' => 111111111,
            'admin' => true
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@plh23.com',
            'password' => 'Psyllou-23',
            'address' => 'Παγκράτι',
            'municipality' => 'Κηφισιάς',
            'county' => 'Δράμας',
            'username' => 'user',
            'fuel' => $fuels[0],
            'afm' => 111111112,
            'admin' => false
        ]);

        $faker = Faker::create('el_GR');

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make(Str::random(10)),
                'address' => $faker->address,
                'municipality' => $municipalities[rand(0, sizeof($municipalities) - 1)],
                'county' => $counties[rand(0, sizeof($counties) - 1)],
                'username' => $faker->userName,
                'fuel' => $fuels[rand(0, sizeof($fuels) - 1)],
                'afm' => $faker->unique()->randomNumber(9),
                'admin' => false
            ]);
        }
    }
}
