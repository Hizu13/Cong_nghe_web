<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class ItCentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 3) as $index) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,
                'location' => $faker->address,
                'contact_email' => $faker->email,
            ]);
        }
    }
}
