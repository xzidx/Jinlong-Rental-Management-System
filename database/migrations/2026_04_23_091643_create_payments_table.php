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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lease_id')->constrained()->onDelete('cascade');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card', 'check'])->default('cash');
            $table->decimal('amount', 12, 2);
            $table->date('payment_date');
            $table->date('due_date');
            $table->enum('status', ['paid', 'pending', 'overdue', 'refunded'])->default('pending');
            $table->string('transaction_reference')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('payment_date');
            $table->index('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
