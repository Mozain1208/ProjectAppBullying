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
        Schema::table('reports', function (Blueprint $table) {
            // Change enum to string to allow any value and fix case sensitivity issues
            // This removes the Strict Enum Check constraint in SQLite
            $table->string('bullying_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            // Revert back to enum
            $table->enum('bullying_type', ['verbal', 'fisik', 'sosial', 'emosional'])->change();
        });
    }
};
