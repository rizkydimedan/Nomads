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
            $table->foreignId('travel_packages_id')->constrained(table: 'travel_packages', indexName: 'packages_id');
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'posts_user_id');
            $table->integer('additional_visa');
            $table->integer('additional_total');
            $table->integer('transaction_details');
            $table->softDeletes();
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
