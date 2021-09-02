<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipType;

class MembershipTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $membership_types = [
            [
                'id'             => 1,
                'name'           => 'Honorable',
            ],
            [
                'id'             => 2,
                'name'           => 'Memakert',
            ],
        ];

        MembershipType::insert($membership_types);

    }
}
