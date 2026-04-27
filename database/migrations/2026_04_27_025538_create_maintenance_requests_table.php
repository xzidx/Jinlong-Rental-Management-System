<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;  // ← FIXED: Blueprint, not SchemaBlueprint!
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {  // ← FIXED: table name
            $table->id();
            $table->foreignId('lease_id')->constrained()->onDelete('cascade');
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('priority', ['low', 'medium', 'high', 'emergency'])->default('medium');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');  // ← FIXED: in_progress
            $table->date('requested_date');
            $table->date('scheduled_date')->nullable();      // ← FIXED: no space!
            $table->date('completed_date')->nullable();      // ← FIXED: no space!
            $table->text('resolution_notes')->nullable();    // ← FIXED: no space!
            $table->decimal('cost', 10, 2)->default(0);
            $table->timestamps();
            
            // ← INDEXES MUST BE INSIDE the Schema::create!
            $table->index('status');
            $table->index('priority');
            $table->index('requested_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');  // ← FIXED: table name
    }
};