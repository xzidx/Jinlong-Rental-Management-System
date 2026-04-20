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
       Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('address');
        $table->string('city');
        $table->string('district');
        $table->string('type');
        $table->integer('total_units')->default(0);
        $table->year('construction_year')->nullable();
        $table->text('description')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
