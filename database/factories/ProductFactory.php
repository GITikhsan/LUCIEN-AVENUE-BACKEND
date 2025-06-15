<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_sepatu' => 'Sepatu ' . $this->faker->unique()->word(),
            'brand' => $this->faker->randomElement(['Nike', 'Adidas', 'Puma', 'Vans']),
            'jenis' => 'Sneakers',
            'material' => 'Canvas',
            'ukuran' => $this->faker->numberBetween(39, 44),
            'warna' => $this->faker->safeColorName(),
            'gender' => $this->faker->randomElement(['Pria', 'Wanita', 'Unisex']),
            'tanggal_rilis' => now(),
            'sku' => $this->faker->unique()->ean8(),
            'dimensi' => '30x20x10 cm',
            'harga_retail' => $this->faker->numberBetween(750000, 2500000),
            'deskripsi' => $this->faker->paragraph(2),
            // Biarkan foreign key null untuk saat ini
            'diskon_id' => null,

            'promo_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
