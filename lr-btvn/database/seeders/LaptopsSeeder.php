<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renters = DB::table('renters')->pluck('id'); // Lấy tất cả id người thuê

        foreach (range(1, 10) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->word,
                'model' => $faker->word,
                'specifications' => $faker->sentence,
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renters), // Random người thuê
            ]);
        }
    }
}
