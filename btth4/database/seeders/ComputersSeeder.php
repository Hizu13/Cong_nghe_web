<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            $computerId = DB::table('computers')->insertGetId([
                'computer_name' => $faker->word,
                'model' => $faker->word,
                'operating_system' => $faker->word,
                'processor' => $faker->word,
                'memory' => $faker->numberBetween(1, 100),
                'available' => $faker->boolean,
            ]);
    }
}
}
