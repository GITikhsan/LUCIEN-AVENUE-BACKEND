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

        Product::create([
    'nama_sepatu' => 'Air Jordan 1 Retro',
    'brand' => 'Nike', // <-- Contoh penambahan
    'jenis' => 'Basket', // <-- Contoh penambahan
    'material' => 'Kulit', // <-- Contoh penambahan
    'ukuran' => '42, 43, 44', // <-- Contoh penambahan
    'warna' => 'Bred Toe', // <-- Contoh penambahan
    'gender' => 'Pria', // <-- Contoh penambahan
    'tanggal_rilis' => '2018-02-24', // <-- Contoh penambahan
    'harga_retail' => 2500000,
    'deskripsi' => 'Sepatu basket ikonik dari Nike.',
    'sku' => 'AJ1-001',
]);

        
    }



}
