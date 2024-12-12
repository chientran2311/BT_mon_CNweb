<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class prac03Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerIds = [];
        $memoryOptions = [4, 8, 16, 32, 64,128];
        for ($i = 0; $i < 10; $i++) {
            $computerIds[] = DB::table('computers')->insert([
                'computer_name' => 'Computer-' . $faker->unique->name,
                'model' => $faker->randomElement(['Dell OptiPlex', 'HP EliteDesk', 'Lenovo ThinkCentre', 'Mac Mini']),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'macOS Monterey', 'macOS Ventura', 'Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'AMD Ryzen 7', 'M1 Pro']),
                'memory' => $faker->randomElement($memoryOptions),
                'available' => $faker->boolean(),
            ]);
        }


        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 month','now'),
                'description' => $faker->sentence(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved', 'Closed']),
            ]);
        }
    }
}
 /**
     * Run the database seeds....
     */
