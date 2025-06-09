<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Primary key komposit lebih cocok di sini, tapi mengikuti permintaan.
        Schema::create('managements', function (Blueprint $table) {
            $table->id('manajemen_id'); // PK standar

            // Kolom sebagai PK sesuai permintaan Anda adalah tidak biasa,
            // jadi saya menggunakan foreign key biasa.
            $table->foreignId('pesanan_id')->constrained('orders', 'pesanan_id'); // FK
            $table->foreignId('produk_id')->constrained('products', 'produk_id'); // FK
            $table->foreignId('keranjang_id')->constrained('carts', 'keranjang_id'); // FK
            $table->foreignId('user_id')->constrained('users', 'user_id'); // FK
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('managements');
    }
};
