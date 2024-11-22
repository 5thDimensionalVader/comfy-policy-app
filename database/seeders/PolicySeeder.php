<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\Policy;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $policyTypes = ['Life', 'Health', 'Auto', 'Property', 'Travel'];
        $statuses = ['Active', 'Pending', 'Expired'];

        for ($i = 1; $i <= 50; $i++) {
            $startDate = Carbon::now()->subMonths(rand(0, 12));

            $endDate = Carbon::parse($startDate)->addYears(rand(1, 2));

            $policyNumber = 'POL-' . date('Y') . '-' . str_pad($i, 5, '0', STR_PAD_LEFT);

            Policy::create([
                'policy_number' => $policyNumber,
                'customer_name' => $faker->name,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'policy_type' => $faker->randomElement($policyTypes),
                'status' => $faker->randomElement($statuses),
                'premium_amount' => $faker->randomFloat(2, 100, 1000),
            ]);
        }
    }
}
