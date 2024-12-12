<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class prac02Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classIds = [];
        for ($i = 0; $i < 10; $i++) {
            $classIds[]= DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K','Kindergarten','Primary school','Secondary school','High school']),
                'room_number' => 'VH' . $faker->numberBetween(1, 10),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber(),
                'class_id' => $faker->randomElement($classIds),
            ]);
        }
    }
}
 /**
     * Run the database seeds....
     */
