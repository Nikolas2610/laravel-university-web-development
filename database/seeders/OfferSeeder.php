<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\Fuel;
use App\Models\Municipality;
use App\Models\Offer;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('el_GR');

        // Get all users
        $users = User::all();
        $counties = County::all();
        $municipalities = Municipality::all();
        $fuels = Fuel::all();

        foreach ($users as $user) {
            try {
                $name = $user->name;
                $afm = $user->afm;

                for ($i = 0; $i < 3; $i++) {
                    $county = $counties->random();
                    $municipality = $municipalities->random();
                    $fuel = $fuels->random();

                    // Check if there is already an offer from this user for this fuel type
                    $previousOffer = Offer::where('user_id', $user->id)
                        ->where('fuel_id', $fuel->id)
                        ->first();

                    if (isset($previousOffer->id)) {
                        $previousOffer->expire_date = $faker->dateTimeBetween('+1 day', '+1 year');
                        $previousOffer->amount = $faker->numberBetween(1, 3);
                        $previousOffer->save();

                    } else {
                        Offer::create([
                            'user_id' => $user->id,
                            'name' => $name,
                            'afm' => $afm,
                            'address' => $faker->address,
                            'municipality_id' => $municipality->id,
                            'county_id' => $county->id,
                            'fuel_id' => $fuel->id,
                            'amount' => $faker->numberBetween(1, 3),
                            'expire_date' => $faker->dateTimeBetween('+1 day', '+1 year')
                        ]);
                    }
                }
            } catch (\Exception $e) {
                echo "Error creating or updating offers for user $name: " . $e->getMessage() . "\n";
            }
        }
    }
}
