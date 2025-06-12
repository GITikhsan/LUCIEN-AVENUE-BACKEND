<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Tambahkan kolom untuk menyimpan URL gambar setelah kolom deskripsi
            $table->string('image')->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
