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
        Schema::create('credit_rebuilder', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_number');
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->decimal('monthly_fee', 10, 2)->nullable();
            $table->decimal('amount_saved', 10, 2)->nullable();
            $table->integer('tot_lineOfCr')->unsigned();
            $table->integer('tot_payments')->unsigned();
            $table->integer('tot_payments_toDate')->unsigned();
            $table->date('due_date');
            $table->timestamps();
            $table->decimal('amount', 5, 2)->nullable()->default(123.45);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_rebuilder');
    }
};
