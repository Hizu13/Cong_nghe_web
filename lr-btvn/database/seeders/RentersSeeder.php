<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
