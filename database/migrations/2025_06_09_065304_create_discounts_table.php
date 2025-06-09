<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('diskon_id'); // PK
            $table->decimal('diskon', 5, 2);
            $table->timestamp('tanggal_mulai')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
