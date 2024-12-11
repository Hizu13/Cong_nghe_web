<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $centers = DB::table('it_centers')->pluck('id'); // Lấy tất cả id trung tâm

        foreach (range(1, 10) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centers), // Random trung tâm
            ]);
        }
    }
}
