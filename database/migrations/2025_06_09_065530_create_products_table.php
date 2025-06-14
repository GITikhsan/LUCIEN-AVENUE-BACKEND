<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
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

            // Kolom untuk menyimpan URL gambar yang di-upload
            $table->string('image')->nullable(); // <-- INI YANG PALING PENTING DITAMBAHKAN

            // Foreign Keys
            $table->foreignId('diskon_id')->nullable()->constrained('discounts', 'diskon_id');
            $table->foreignId('gambar_produk_id')->nullable()->constrained('product_images', 'gambar_produk_id');
            $table->foreignId('promo_id')->nullable()->constrained('promotions', 'promo_id');

            $table->timestamps(); // Membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
