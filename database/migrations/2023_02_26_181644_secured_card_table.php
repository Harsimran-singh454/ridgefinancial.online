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
        Schema::create('secured_card', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_number');
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->decimal('current_balance', 10, 2)->nullable();
            $table->integer('authorizations');
            $table->decimal('credit_remaining', 10, 2)->nullable();
            $table->date('due_date');
            $table->date('cycle_date');
            $table->integer('transactions');
            $table->bigInteger('card_number');
            $table->integer('pin_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secured_card');
    }
};
