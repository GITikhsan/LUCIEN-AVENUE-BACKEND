<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('promo_id'); // PK
            $table->string('nama_promo');
            $table->timestamp('mulai_tanggal')->nullable();
            $table->timestamp('selesai_tanggal')->nullable();
            $table->decimal('diskonP', 5, 2);
            $table->string('kode');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
