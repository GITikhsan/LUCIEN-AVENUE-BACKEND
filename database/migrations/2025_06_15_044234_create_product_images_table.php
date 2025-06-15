<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Ini adalah blueprint untuk tabel yang akan menyimpan banyak gambar untuk setiap produk.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('gambar_produk_id'); // Primary key untuk tabel ini

            // Kolom ini untuk menghubungkan ke produk mana gambar ini milik.
            // Nama kolom 'produk_id' dan nama tabel 'products' harus cocok dengan tabel produkmu.
            // onDelete('cascade') artinya jika sebuah produk dihapus, semua gambarnya otomatis ikut terhapus.
            $table->foreignId('produk_id')->constrained('products', 'produk_id')->onDelete('cascade');

            // Kolom untuk menyimpan path/nama file gambarnya (contoh: 'products/gambar-123.jpg')
            $table->string('path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
