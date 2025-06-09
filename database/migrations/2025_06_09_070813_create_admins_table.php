<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('karyawan_id'); // PK
            $table->string('username_k')->unique();
            $table->string('password_k');
            $table->string('email')->unique();
            $table->string('posisi')->nullable();
            $table->decimal('gaji', 15, 2)->nullable();
            $table->timestamp('tanggal_diterima')->nullable();

            // FK Sesuai Permintaan Anda
            $table->foreignId('pengiriman_id')->nullable()->constrained('shipments', 'pengiriman_id'); // FK
            $table->foreignId('produk_id')->nullable()->constrained('products', 'produk_id'); // FK
            // Nama FK 'manajemenP_id' diubah menjadi 'manajemen_id' agar cocok dengan tabel 'managements'
            $table->foreignId('manajemen_id')->nullable()->constrained('managements', 'manajemen_id'); // FK
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
