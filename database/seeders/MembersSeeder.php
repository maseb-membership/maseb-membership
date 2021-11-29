<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
            if ($user->id > 5) {

                if ($faker->randomElement([0, 1, 1, 1, 1])) {
                    $registered_at = $faker->dateTimeThisYear('+100 days');
                    $approved_at = $faker->dateTimeThisMonth('+0 days');

                    $member = Member::create([
                        "membership_status" => $faker->randomElement([0, 1, 1, 1, 2, 1, 3]),
                        "registered_at" => $registered_at,
                        "registered_by" => $faker->randomElement([$user->id, 3, 2, 5]),

                        "approved_at" => $approved_at,
                        "approved_by" => $faker->randomElement($users->pluck('id')),
                        "registration_method" => $faker->randomElement([0, 1]),

                    ]);

                    //Seed Membershiop Types to Member
                    $member->membership_types()->attach($faker->randomElements([1, 2]), [
                        'published_at' => $faker->dateTimeThisMonth('+0 days'),
                        'published_by' => $faker->randomElement([$user->id, 3, 2, 5]),
                        'approved_at' => $faker->dateTimeBetween('-9 days', '+0 days'),
                        'approved_by' => $faker->randomElement([2, 3]),
                    ]);

                    //Seed Membershiop Levels to Member
                    $member->membership_levels()->attach($faker->randomElements([1, 2, 3]), [
                        'published_at' => $faker->dateTimeThisMonth('+0 days'),
                        'published_by' => $faker->randomElement([$user->id, 3, 2, 5]),
                        'approved_at' => $faker->dateTimeBetween('-9 days', '+0 days'),
                        'approved_by' => $faker->randomElement([2, 3]),
                    ]);

                    $update_user = User::find($user->id);
                    $update_user->member_id = $member->id;
                    $update_user->save();
                }
            }

        }

    }
}
