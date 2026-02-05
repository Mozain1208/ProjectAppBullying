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
            // New status column to support more states
            // We use string to avoid enum strictness issues during migration, handled by model logic
            $table->string('account_status')->default('active')->after('role'); 
            
            $table->integer('warning_count')->default(0)->after('account_status');
            $table->timestamp('banned_until')->nullable()->after('warning_count');
            $table->json('restricted_features')->nullable()->after('banned_until');
            $table->string('risk_level')->default('low')->after('restricted_features'); // low, medium, high
            $table->text('admin_notes')->nullable()->after('risk_level');
            $table->text('last_block_reason')->nullable()->after('admin_notes');
        });

        // Migrate existing status data
        DB::statement("UPDATE users SET account_status = status");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'account_status',
                'warning_count',
                'banned_until',
                'restricted_features',
                'risk_level',
                'admin_notes',
                'last_block_reason'
            ]);
        });
    }
};
