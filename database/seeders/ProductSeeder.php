<?php

namespace Database\Seeders;

use App\Models\Product; // <-- Jangan lupa import Model Product
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Perintah ini akan membuat 50 data produk palsu
        // menggunakan ProductFactory yang sudah kita buat.
        Product::factory()->count(50)->create();
    }
}
