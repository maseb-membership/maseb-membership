<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        foreach ($users as $user) {
            $address = Address::create(
                [
                    'country' => $faker->randomElement(['Ethiopia']),
                    'city' => $faker->randomElement(['Addis Ababa']),
                    'zone_sub_city' => $faker->randomElement(['Lideta', 'Kolfe k', 'Kirkos', 'Bole']),
                    'kebele' => $faker->randomElement(['']),
                    'woreda' => $faker->randomElement(['']),
                    'house_no' => $faker->randomElement(['New', '1122', '1211','1','12131','1213']),
                    'phone_mobile' => $faker->bothify('09########'),
                    'phone_mobile_2' => $faker->bothify('09########'),
                    'phone_fixed_line' => $faker->bothify('01########'),
                ]
            );

            $user->address_id = $address->id;
            $user->save();
        }
    }
}
