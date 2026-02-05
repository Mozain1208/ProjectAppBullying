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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('role');
            // We can't easily drop enum columns in some DBs without specific tools, 
            // but for simplicity we will just add age and we can keep the old column for now or drop it.
            // Let's drop it to follow the user's request of "jangan format kategori".
            $table->dropColumn('age_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->enum('age_category', ['child', 'teen', 'adult'])->nullable()->after('role');
        });
    }
};
