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
        Schema::table('product_images', function (Blueprint $table) {
            // Pastikan baris ini ada untuk menghapus kolom 'path'
            $table->dropColumn('path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            // Saat rollback, tambahkan kembali kolom 'path'.
            // PENTING: Ini adalah definisi yang mungkin harus disesuaikan jika rollback error.
            // Tapi untuk saat ini, coba dulu seperti ini:
            $table->string('path')->nullable(); // Anggap defaultnya bisa null jika sebelumnya tidak diisi
            // Jika sebelumnya NOT NULL, maka baris ini bisa error saat rollback.
            // Jika rollback error, bisa diganti $table->string('path')->default('')->nullable(false);
        });
    }
};
