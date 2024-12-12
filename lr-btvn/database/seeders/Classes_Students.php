<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Classes_Students extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faker = Faker::create();
            $classid = DB::table('classes')->pluck('id');
        foreach (range(1, 10) as $index) {
            DB::table('classes')->insert([
                [
                    'grade_level' => 'Pre-K',
                    'room_number' => 'VH7',
                    
                ],
               
            ]);
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->randomElement($classid), // Giả sử bạn có 2 lớp
        
            ]);
        }
    }
}
