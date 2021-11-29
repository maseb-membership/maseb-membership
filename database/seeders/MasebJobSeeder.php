<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MasebJob;

class MasebJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert Jobs
        $jobList = array(
            [
                'id'            => 1,
                'title'         => 'Board Chairman',
                'description'   => '',

            ],
            [
                'id'            => 2,
                'title'         => 'Vice-Chairman of the Board',
                'description'   => '',

            ],
            [
                'id'            => 3,
                'title'         => 'Board Secretary',
                'description'   => '',

            ],
            [
                'id'            => 4,
                'title'         => 'Board Member',
                'description'   => '',

            ],
            [
                'id'            => 5,
                'title'         => 'Manager',
                'description'   => '',

            ],
            [
                'id'            => 6,
                'title'         => 'Internal Auditor',
                'description'   => '',

            ],
            [
                'id'            => 7,
                'title'         => 'Accountant',
                'description'   => '',

            ],
            [
                'id'            => 8,
                'title'         => 'Other Professional Support',
                'description'   => '',

            ],
        );

        MasebJob::insert($jobList);


        //Attach Jobs to Users

        $allJobs = MasebJob::all();

        $users = [1, 2, 3, 4, 5, 15, 16, 17];

        for ($i=1; $i <= 8 ; $i++) {
            $user = User::find($users[$i-1]);
            $user->maseb_job_id = $i;
            $user->save();

            // $masebjob = MasebJob::find($i);

            // $masebjob->user()->save($users);

        }
    }
}
