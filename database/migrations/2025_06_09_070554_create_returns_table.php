<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->id('pengembalian_id'); // PK
            $table->text('pembelian')->nullable();
            $table->text('pengembalian')->nullable();
            $table->foreignId('pesanan_id')->constrained('orders', 'pesanan_id'); // FK
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
