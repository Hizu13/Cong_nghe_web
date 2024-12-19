<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerId = DB::table('computers')->pluck('id');
        $urgencies = ['Low', 'Medium', 'High'];
        $statuses = ['Open', 'In Progress', 'Resolved'];
        foreach (range(1, 50) as $index) {
        DB::table('issues')->insert([
            'computer_id' => $faker->randomElement($computerId),
            'reported_by' => $faker->name,
            'reported_date' => $faker->dateTimeBetween('-1 month'),
            'description' => $faker->paragraph,
            'urgency' => $urgencies[array_rand($urgencies)], // Chọn ngẫu nhiên một giá trị từ mảng urgencies
            'status' => $statuses[array_rand($statuses)], // Chọn ngẫu nhiên một giá trị từ mảng statuses
        ]);
    }
}
}
