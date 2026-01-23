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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('age_category', ['child', 'teen', 'adult']);
            $table->text('description');
            $table->enum('bullying_type', ['verbal', 'fisik', 'sosial', 'emosional']);
            $table->enum('status', ['pending', 'process', 'resolved'])->default('pending');
            $table->string('location');
            $table->dateTime('incident_time');
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index('status');
            $table->index('bullying_type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
