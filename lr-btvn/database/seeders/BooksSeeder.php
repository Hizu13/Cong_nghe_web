<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraries = DB::table('library')->pluck('id'); // Lấy tất cả id thư viện

        foreach (range(1, 10) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->word,
                'library_id' => $faker->randomElement($libraries), // Random thư viện
            ]);
        }
    }
}
