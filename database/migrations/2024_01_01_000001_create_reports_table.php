<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Reporter Information
            $table->string('reporter_name')->nullable();
            $table->integer('reporter_age')->nullable();
            $table->string('reporter_role')->default('korban'); // korban, saksi
            
            // Incident Details
            $table->string('victim_name')->nullable();
            $table->string('perpetrator_name')->nullable();
            $table->string('bullying_type'); // verbal, fisik, sosial, cyber
            $table->dateTime('incident_time')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            
            // Legacy fields (for backward compatibility)
            $table->date('incident_date')->nullable();
            $table->string('incident_location')->nullable();
            
            // Status and Admin
            $table->string('status')->default('pending'); // pending, process, investigating, resolved, dismissed
            $table->text('admin_notes')->nullable();
            
            // Privacy
            $table->boolean('anonymous')->default(false);
            $table->boolean('is_anonymous')->default(false);
            
            $table->timestamps();
        });

        Schema::create('report_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->integer('file_size')->nullable();
            $table->timestamps();
        });

        Schema::create('report_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_messages');
        Schema::dropIfExists('report_evidences');
        Schema::dropIfExists('reports');
    }
};
