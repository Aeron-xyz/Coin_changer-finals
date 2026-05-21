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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['load', 'dispense']);
            $table->unsignedInteger('coin_1')->default(0);
            $table->unsignedInteger('coin_5')->default(0);
            $table->unsignedInteger('coin_10')->default(0);
            $table->unsignedInteger('coin_20')->default(0);
            $table->unsignedInteger('total_amount');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
