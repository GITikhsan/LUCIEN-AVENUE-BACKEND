<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // PK
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('pembelian')->nullable();
            $table->text('pengembalian')->nullable();
            $table->string('no_telepon')->nullable();
            $table->timestamps(); // Termasuk tanggal_dibuat
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
