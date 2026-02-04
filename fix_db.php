<?php

// include laravel
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

echo "Fixing reports table constraint...\n";

try {
    if (config('database.default') === 'sqlite') {
        // Backup data
        $reports = DB::table('reports')->get();
        echo "Backed up " . count($reports) . " reports.\n";

        // Drop the old table
        Schema::dropIfExists('reports');
        echo "Dropped old reports table.\n";

        // Recreate the table exactly as it should be
        Schema::create('reports', function ($table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('reporter_name')->nullable();
            $table->integer('reporter_age')->nullable();
            $table->string('reporter_role')->default('korban');
            $table->text('description')->nullable();
            $table->string('bullying_type'); // STRING, NO CHECK
            $table->string('location')->nullable();
            $table->dateTime('incident_time')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
        echo "Recreated reports table.\n";

        // Restore data
        foreach ($reports as $report) {
            $data = (array) $report;
            try {
                DB::table('reports')->insert($data);
            } catch (\Exception $e) {
                echo "Warning: Could not restore report {$report->id}: " . $e->getMessage() . "\n";
            }
        }
        echo "Data restoration complete.\n";
    } else {
        echo "Not using SQLite, skipping manual recreation.\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

echo "Done.\n";
