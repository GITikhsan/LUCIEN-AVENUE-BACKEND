<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('pembayaran_id'); // PK
            $table->string('metode_pembayaran');
            $table->string('password')->nullable();
            $table->string('status_pembayaran');
            $table->decimal('jumlah', 15, 2);
            $table->foreignId('pesanan_id')->constrained('orders', 'pesanan_id'); // FK
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

