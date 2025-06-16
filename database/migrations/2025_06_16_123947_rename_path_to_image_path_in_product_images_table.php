<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('product_images', function (Blueprint $table) {
        $table->renameColumn('path', 'image_path');
    });
}

public function down(): void
{
    Schema::table('product_images', function (Blueprint $table) {
        $table->renameColumn('image_path', 'path');
    });
}
};
