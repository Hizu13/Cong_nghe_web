<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $faker = Faker::create();
            $medicinesid = DB::table('medicines')->pluck('id');

             foreach (range(1, 30) as $index) {
                DB::table('sales')->insert([
                    'medicine_id' =>$faker->randomElement($medicinesid), // Random thư viện, // Giả sử bạn có 10 loại thuốc
                    'quantity' => $faker->numberBetween(1, 100),
                    'sale_date' => $faker->dateTimeThisYear(),
                    'customer_phone' => $faker->regexify('[0-9]{10}'),
                ]);
            }
        }
    }
}
