<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('barang_pesanan_id'); // PK
            $table->decimal('harga', 15, 2);
            $table->integer('quantity');
            $table->foreignId('pesanan_id')->constrained('orders', 'pesanan_id'); // FK
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
