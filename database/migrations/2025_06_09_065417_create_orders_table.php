<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->decimal('jumlah_total', 15, 2);
            $table->string('status_pesanan');
            $table->timestamps(); // <-- TAMBAHKAN BARIS INI
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
