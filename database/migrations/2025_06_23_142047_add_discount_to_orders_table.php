<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        // Kolom untuk menyimpan subtotal sebelum diskon
        $table->decimal('subtotal', 15, 2)->after('jumlah_total')->default(0);
        // Kolom untuk menyimpan jumlah diskon
        $table->decimal('discount', 15, 2)->after('subtotal')->default(0);
        // Kolom untuk menyimpan kode promo yang digunakan
        $table->string('promotion_code')->nullable()->after('discount');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
