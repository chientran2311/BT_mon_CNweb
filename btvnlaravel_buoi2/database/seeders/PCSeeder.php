<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $renterid = [];
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $renterid[] = DB::table("renters")->insert([
                "name"=> $faker->name,
                'phone_number'=> $faker->phoneNumber,
                'email'=> $faker->email,
            ]);
        }

        for ($i = 0; $i < 10; $i++){
                DB::table("laptops")->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Apple', 'Asus']),
                'model' => $faker->regexify('[A-Z0-9]{3}-[A-Z0-9]{4}'),
                'specifications' => $faker->randomElement([
                    'i5, 16GB RAM, 512GB SSD',
                    'i7, 16GB RAM, 512GB SSD',
                    'i3, 8GB RAM, 128GB SSD',
                    'i9, 64GB RAM, 1024GB SSD',
                ]),
                'rental_status' => $faker->boolean,
                'renterid' => $faker->randomElement($renterid)
            ]);
        }

    }
}
/*
$faker->boolean(80); // 80% true, 20% false
$faker->boolean(20); // 20% true, 80% false
*/
