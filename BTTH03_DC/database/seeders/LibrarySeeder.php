<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
        DB::table("libraries")->insert([
             'name'=> $faker->name .' Library',
             'address'=> $faker->address,
             'contact_number'=> $faker->phoneNumber,
        ]);
        }
        $libraryid = DB::table('libraries')->pluck('libraryid')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table("books")->insert([
                 'title'=> $faker->sentence(3),
                 'author'=> $faker->name,
                 'publication_year'=> $faker->dateTimeBetween('-5 years','now'),
                 'genre' => $faker->word,
                 'libraryid' =>$faker->randomElement($libraryid)
            ]);
            }
    }

    /*

    CACH2 :
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo thư viện và lưu lại libraryid
        $libraryIds = [];
        for ($i = 0; $i < 10; $i++) {
            $libraryIds[] = DB::table("libraries")->insertGetId([
                'name' => $faker->company . ' Library',
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
            ]);
        }

        // Tạo sách và liên kết với thư viện
        for ($i = 0; $i < 20; $i++) {
            DB::table("books")->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'publication_year' => $faker->dateTimeBetween('-5 years', 'now'),
                'genre' => $faker->word,
                'libraryid' => $faker->randomElement($libraryIds),
            ]);
        }
    }

    */
}
