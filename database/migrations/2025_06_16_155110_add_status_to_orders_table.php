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
            Schema::table('orders', function (Blueprint $table) {
                // Menambahkan kolom 'status' setelah kolom 'user_id' (atau sesuaikan)
                // Nilai default-nya adalah 'pending'
                $table->string('status')->default('pending')->after('user_id');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    };
    