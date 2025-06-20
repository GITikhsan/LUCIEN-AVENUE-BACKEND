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
    Schema::create('promotion_user', function (Blueprint $table) {
        $table->id();

        // NAMA & TIPE DATA DISESUAIKAN DENGAN BUKTI AKURAT
        // Tipe: BIGINT UNSIGNED, Nama: 'promo_id'
        $table->unsignedBigInteger('promo_id');

        // Ini sudah benar sesuai migrasi users Anda
        $table->unsignedBigInteger('user_id');

        $table->timestamps();

        // REFERENSI NAMA KOLOM JUGA DISESUAIKAN
        $table->foreign('promo_id')->references('promo_id')->on('promotions')->onDelete('cascade');
        $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

        // Terakhir, unique key juga disesuaikan
        $table->unique(['promo_id', 'user_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_user');
    }
};
