<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Computers_Issues extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $urgencies = ['Low', 'Medium', 'High'];
        $statuses = ['Open', 'In Progress', 'Resolved'];
        foreach (range(1, 10) as $index) {
            $computerId = DB::table('computers')->insertGetId([
                'computer_name' => $faker->word,
                'model' => $faker->word,
                'operating_system' => $faker->word,
                'processor' => $faker->word,
                'memory' => $faker->numberBetween(1, 100),
                'available' => $faker->boolean,
            ]);
            DB::table('issues')->insert([
                'computer_id' => $computerId,
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeBetween('-1 month'),
                'description' => $faker->paragraph,
                'urgency' => $urgencies[array_rand($urgencies)], // Chọn ngẫu nhiên một giá trị từ mảng urgencies
                'status' => $statuses[array_rand($statuses)], // Chọn ngẫu nhiên một giá trị từ mảng statuses
            ]);
    }
}
}