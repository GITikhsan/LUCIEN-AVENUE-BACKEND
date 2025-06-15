<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('produk_id'); // Primary Key
            $table->string('nama_sepatu');
            $table->string('brand')->nullable();
            $table->string('jenis')->nullable();
            $table->string('material')->nullable();
            $table->string('ukuran');
            $table->string('warna');
            $table->string('gender')->nullable();
            $table->date('tanggal_rilis')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('dimensi')->nullable();
            $table->decimal('harga_retail', 15, 2);
            $table->text('deskripsi')->nullable();


            // Foreign Keys (Versi yang sudah diperbaiki)
            $table->unsignedBigInteger('diskon_id')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();

            $table->foreign('diskon_id')->references('diskon_id')->on('discounts')->onDelete('set null');
            $table->foreign('promo_id')->references('promo_id')->on('promotions')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
