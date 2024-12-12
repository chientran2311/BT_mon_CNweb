<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class prac01Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicineIds = [];

        for ($i = 0; $i < 10; $i++) {
            $medicineIds[] = DB::table('medicines')->insert([
                'name' => $faker->word(),
                'brand' => $faker->company(),
                'dosage' => $faker->randomFloat(1, 0.5, 20),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup', 'Injection', 'Cream']),
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->numberBetween(10, 500),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'customer_phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
 /**
     * Run the database seeds...
     */
