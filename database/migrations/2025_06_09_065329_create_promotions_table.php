<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('promo_id'); // Primary Key
            $table->string('nama_promo');
            $table->dateTime('mulai_tanggal')->nullable(); // <-- Diganti dari timestamp
            $table->dateTime('selesai_tanggal')->nullable(); // <-- Diganti dari timestamp
            $table->decimal('diskonP', 5, 2);
            $table->string('kode');
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
