<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use Faker\Factory as Faker;

class MembersSeeder extends Seeder
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

            $member = Member::create([
                "membership_status" => $faker->randomElement([0,1,2,3]),
                "registered_at" => $faker->dateTimeThisMonth('+12 days'),
                "registered_by" => $faker->randomElement($users->pluck('id')),

                "approved_at" => $faker->dateTimeThisMonth('+12 days'),
                "approved_by" => $faker->randomElement($users->pluck('id')),

            ]);

        }

        //Seed Membershiop Types to Member
        $member->membership_types()->attach($faker->randomElements([1,2]), [
            'created_at' => $faker->dateTimeThisMonth('+12 days'),
            'created_by' => $faker->randomElement($users->pluck('id')),
            'approved_at' => $faker->dateTimeThisMonth('+12 days'),
            'approved_by' => $faker->randomElement($users->pluck('id')),
        ]);

        //Seed Membershiop Levels to Member
        $member->membership_levels()->attach($faker->randomElements([1,2,3]), [
            'created_at' => $faker->dateTimeThisMonth('+12 days'),
            'created_by' => $faker->randomElement($users->pluck('id')),
            'approved_at' => $faker->dateTimeThisMonth('+12 days'),
            'approved_by' => $faker->randomElement($users->pluck('id')),
        ]);

    }
}
