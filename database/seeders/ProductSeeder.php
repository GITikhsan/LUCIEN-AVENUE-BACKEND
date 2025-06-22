<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 50 produk palsu menggunakan factory
        Product::factory()->count(50)->create();

        // Tambahkan satu produk manual
        Product::create([
            'nama_sepatu'     => 'Air Jordan 1 Retro',
            'brand'           => 'Nike',
            'jenis'           => 'Basket',
            'material'        => 'Kulit',
            'ukuran'          => '42, 43, 44',
            'warna'           => 'Bred Toe',
            'gender'          => 'Pria',
            'tanggal_rilis'   => '2018-02-24',
            'harga_retail'    => 2500000,
            'deskripsi'       => 'Sepatu basket ikonik dari Nike.',
            'sku'             => 'AJ1-001',
        ]);

        // Tambahkan 3 gambar untuk setiap produk
        Product::all()->each(function ($product) {
            for ($i = 1; $i <= 3; $i++) {
                $sampleImagePath = storage_path("app/public/sample_images/{$i}.jpg");

                if (!file_exists($sampleImagePath)) continue;

                $filename = Str::uuid() . '.jpg';
                $storagePath = "produk/{$filename}";

                Storage::disk('public')->put($storagePath, file_get_contents($sampleImagePath));

                ProductImage::create([
                    'produk_id'   => $product->produk_id,
                    'image_path'  => $storagePath, // ✅ sesuai dengan field di tabel
                ]);
            }
        });
    }
}
