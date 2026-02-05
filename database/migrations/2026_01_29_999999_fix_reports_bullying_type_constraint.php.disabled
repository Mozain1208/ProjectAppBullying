<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('database.default') === 'sqlite') {
            // 1. Get current data
            $reports = DB::table('reports')->get();

            // 2. Drop the old table
            Schema::dropIfExists('reports');

            // 3. Recreate the table with the EXACT required structure but NO enum/check constraints
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->text('description');
                $table->string('bullying_type'); // Changed to string, no check constraint
                $table->string('status')->default('pending'); // Changed to string, no check constraint
                $table->string('location');
                $table->datetime('incident_time');
                $table->boolean('anonymous')->default(false);
                $table->string('reporter_name')->nullable();
                $table->integer('reporter_age')->nullable();
                $table->string('reporter_role')->default('korban'); // Changed to string, no check constraint
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                
                // Add indexes for performance
                $table->index('status');
                $table->index('bullying_type');
                $table->index('created_at');
            });

            // 4. Restore data
            foreach ($reports as $report) {
                try {
                    DB::table('reports')->insert((array)$report);
                } catch (\Exception $e) {
                    \Log::warning("Could not restore report ID {$report->id}: " . $e->getMessage());
                }
            }
        } else {
            // For Postgres/MySQL, we can just change the columns
            Schema::table('reports', function (Blueprint $table) {
                $table->string('bullying_type')->change();
                $table->string('status')->change();
                $table->string('reporter_role')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No easy rollback for SQLite recreation
    }
};
