<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemas = DB::table('cinemas')->pluck('id'); // Lấy tất cả id rạp chiếu

        foreach (range(1, 10) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180), // Thời gian phim
                'cinema_id' => $faker->randomElement($cinemas), // Random rạp chiếu
            ]);
        }
    }
}
