<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder-seeder Anda di sini
        $this->call([
            //ProductSeeder::class,
            UserSeeder::class,
            // Jika punya seeder lain, tambahkan di sini. Contoh: UserSeeder::class
        ]);
    }
}
