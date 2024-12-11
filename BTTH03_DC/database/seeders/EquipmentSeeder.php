<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $it_centersid = [];
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
           $it_centersid = DB::table("it_centers")->insert([
                "name"=> $faker->name,
                'location'=> $faker->address,
                'contact_email' => $faker->email
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
                 DB::table("hardware_devices")->insert([
                 "device_name"=> $faker->name,
                 'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset', 'Monitor', 'speaker']),
                 'status' => $faker->boolean(70),
                 'it_centersid'=> $faker->randomElement($it_centersid)
             ]);
         }

    }
}
