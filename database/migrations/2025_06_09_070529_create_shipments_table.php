<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id('pengiriman_id'); // PK
            $table->string('track_nomor')->nullable();
            $table->string('metode_pengiriman');
            $table->string('status_pengiriman');
            $table->date('perkiraan_pengiriman')->nullable();
            $table->foreignId('pesanan_id')->constrained('orders', 'pesanan_id'); // FK
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
