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
                'name'           => 'member',
                'last_name'     => 'user',
                'email'          => 'member@user.com',
                'password'       => bcrypt('12345678'),
                'name'       => '',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'system',
                'last_name'     => 'admin',
                'email'          => 'system@admin.com',
                'password'       => bcrypt('12345678'),
                'name'       => '',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'super',
                'last_name'     => 'admin',
                'email'          => 'super@admin.com',
                'password'       => bcrypt('12345678'),
                'name'       => '',
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'      => 'finance',
                'last_name'     => 'admin',
                'email'          => 'finance@admin.com',
                'password'       => bcrypt('12345678'),
                'name'       => '',
                'remember_token' => null,
            ],
            [
                'id'             => 5,
                'name'      => 'membership',
                'last_name'     => 'admin',
                'email'          => 'membership@admin.com',
                'password'       => bcrypt('12345678'),
                'name'       => '',
                'remember_token' => null,
            ],
        ];

        User::insert($users);


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

    }
}
