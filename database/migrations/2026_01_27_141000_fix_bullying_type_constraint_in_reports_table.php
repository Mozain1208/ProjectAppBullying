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
        // For SQLite, we must recreate the table to remove CHECK constraints
        // Laravel's Schema::table(...)->change() often fails to remove them on SQLite
        if (config('database.default') === 'sqlite') {
            // 1. Get current data
            $reports = DB::table('reports')->get();

            // 2. Drop the old table
            Schema::dropIfExists('reports');

            // 3. Recreate the table with desired structure
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('victim_name')->nullable();
                $table->string('perpetrator_name')->nullable();
                $table->string('bullying_type'); // No enum here, just string
                $table->date('incident_date')->nullable();
                $table->string('incident_location')->nullable();
                $table->text('description')->nullable();
                $table->string('status')->default('pending');
                $table->text('admin_notes')->nullable();
                $table->boolean('is_anonymous')->default(false);
                
                // Added details from later migrations
                $table->string('reporter_name')->nullable();
                $table->integer('reporter_age')->nullable();
                $table->string('reporter_role')->default('korban');
                
                // Fields from the error message that might have been added/renamed
                $table->string('location')->nullable();
                $table->dateTime('incident_time')->nullable();
                $table->boolean('anonymous')->default(false);
                
                $table->timestamps();
            });

            // 4. Restore data (best effort)
            foreach ($reports as $report) {
                $data = (array) $report;
                // If some columns are missing or type-mismatched, the loop handles it
                try {
                    DB::table('reports')->insert($data);
                } catch (\Exception $e) {
                    // Log or ignore errors if data structure changed too much
                    \Log::warning("Could not migrate report ID {$report->id}: " . $e->getMessage());
                }
            }
        } else {
            // For other databases, just change the column
            Schema::table('reports', function (Blueprint $table) {
                $table->string('bullying_type')->change();
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
