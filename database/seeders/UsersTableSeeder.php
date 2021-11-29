<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                // 'maseb_id'      => 'MS1',
                'name'           => 'member',
                'father_name'     => 'user',
                'email'          => 'member1@user.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                // 'maseb_id'      => 'MS2',
                'name'           => 'system',
                'father_name'     => 'admin',
                'email'          => 'system@admin.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                // 'maseb_id'      => 'MS3',
                'name'           => 'super',
                'father_name'     => 'admin',
                'email'          => 'super@admin.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                // 'maseb_id'      => 'MS4',
                'name'      => 'finance',
                'father_name'     => 'admin',
                'email'          => 'finance@admin.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 5,
                // 'maseb_id'      => 'MS5',
                'name'      => 'membership',
                'father_name'     => 'admin',
                'email'          => 'membership@admin.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);

        $members = array();

        for ($i=6; $i < 35; $i++) {
            $member = array([
                'id'             => ''. $i,
                // 'maseb_id'      => 'MS'.$i,
                'name'      => 'member'. ($i-4),
                'father_name'     => 'user',
                'email'          => 'member' . ($i-4) . '@user.com',
                'account_status' => 1,
                'member_id'      => null,
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
                'is_approved'   => $i < 15 ? 1 : 0,
            ]);

            User::insert($member);
            // $members = array_push($member);
        }


        // User::insert($members);


        $user = User::find(1);
        $user->assignRole('member-user');

        $user = User::find(2);
        $user->assignRole('system-manager');

        $user = User::find(3);
        $user->assignRole('super-admin');

        $user = User::find(4);
        $user->assignRole('finance-admin');

        $user = User::find(5);
        $user->assignRole('membership-admin');

        for ($i=6; $i <= 34 ; $i++) {
            $user = User::find($i);

            $user->assignRole('member-user');

        }

    }
}
