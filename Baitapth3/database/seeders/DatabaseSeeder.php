<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
     /**
     * Reverse the migrations.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            prac01Seeder::class,
            prac02Seeder::class,
            prac03Seeder::class,
        ]);
    }
}
 /**
     * Reverse the <migrations class=""></migrations>
     */
