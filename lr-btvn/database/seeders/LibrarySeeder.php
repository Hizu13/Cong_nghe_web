<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('library')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
            ]);
        }
    }
}
