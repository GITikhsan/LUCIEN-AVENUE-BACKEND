<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Perintah ini akan menghapus unique index dari kolom sku
            // 'products_sku_unique' adalah nama default yang dibuat Laravel.
            $table->dropUnique('products_sku_unique');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Ini untuk 'rollback' jika diperlukan
            $table->unique('sku');
        });
    }
};
