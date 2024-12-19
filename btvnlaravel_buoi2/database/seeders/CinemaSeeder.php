<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemaid = [];
        for ($i = 0; $i < 10; $i++) {
            $cinemaid[] = DB::table("cinemas")->insertGetId([
                'name' => $faker->name . ' Cinema',
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(1, 200),
            ]);
        }


        for ($i = 0; $i < 20; $i++) {
            DB::table("movies")->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'duration' => $faker->numberBetween(60, 180),
                'cinemaid' => $faker->randomElement($cinemaid),
            ]);
        }
    }
}
// trả lời rõ về phần model nhaast là phần về quan hệ giữa các bảng belongto

// nếu validate k thành công thì nó sẽ mắc kẹt trong validate và k chạy khỏi đc function store và update và back về trang trước đ
// dùng alert thì phải ví dụ sửa dòng nào hiển thị alert dòng đó
