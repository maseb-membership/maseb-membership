<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipLevel;

class MembershipLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership_levels = [
            [
                'id'             => 1,
                'name'           => 'Founder Level',
            ],
            [
                'id'             => 2,
                'name'           => 'Entry Level',
            ],
            [
                'id'             => 3,
                'name'           => 'Regular Level',
            ],
        ];

        MembershipLevel::insert($membership_levels);
    }
}
