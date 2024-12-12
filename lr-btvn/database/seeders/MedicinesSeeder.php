<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
         foreach (range(1, 30) as $index) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['100mg', '200mg', '500mg']),
                'form' => $faker->randomElement(['Viên nén', 'viên nang', 'xi-rô']),
                'price' => $faker->randomFloat(2, 1, 100), // Giá từ 1 đến 100 với 2 chữ số thập phân
                'stoke' => $faker->numberBetween(0, 1000), // Số lượng tồn kho từ 0 đến 1000
            ]);
        }
    }
}
