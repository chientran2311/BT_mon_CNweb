<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class prac04seeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 60; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->name,
                'model' => $faker->randomElement(['Dell OptiPlex', 'HP EliteDesk', 'Lenovo ThinkCentre', 'Mac Mini']),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'macOS Monterey', 'macOS Ventura', 'Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'AMD Ryzen 7', 'M1 Pro']),
                'memory' => $faker->randomElement([4, 8, 16, 32, 64,128]),
                'available' => $faker->boolean(),
            ]);
        }
        for ($i = 0; $i < 60; $i++) {
            DB::table('issues')->insert([
                'computer_id'=>$faker ->numberBetween(1, 60),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->date(),
                'description' => $faker->paragraph(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
