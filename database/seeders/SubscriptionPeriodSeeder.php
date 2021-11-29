<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\SubscriptionPeriod;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Jenssegers\Date\Date;

class SubscriptionPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $periods = [];
        for ($i = 1; $i <= 9; $i++) {
            $period = array([
                'name' => 'month' . $i,
                'period_no' => $i,
                "from_date" => $faker->date(),
                "to_date" => $faker->date(),
                'created_at' => Date::now()->format('Y-m-d H:i:s'),
                'updated_at' => Date::now()->format('Y-m-d H:i:s'),

            ]);
            SubscriptionPeriod::insert($period);
        }

        $members = Member::all();
        $subscription_periods = SubscriptionPeriod::all();

        $periodic_payments = [];

        foreach ($members as $member) {
            if ($member->approved_at != null) {
                for ($j = 1; $j <= 9; $j++) {

                    if ($faker->randomElement([0, 1, 1, 1, 1])) {
                        $member->subscription_periods()->attach($j,
                            [
                                "amount" => 300,
                                "payment_date" => $faker->date(),
                                'reciept_no' => $faker->regexify('[T-T]{2}[0-4]{8}'),
                                'method' => $faker->randomElement(['Cash', 'CBE', 'Abyssinia', 'CBE Birr', 'Dashen']),

                            ]);

                    }
                }
            }
        }

        // PeriodicPayment::insert($periodic_payments);
    }
}
