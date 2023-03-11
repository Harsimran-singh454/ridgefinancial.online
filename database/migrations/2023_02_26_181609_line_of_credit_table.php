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
        Schema::create('line_of_credit', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('name');
            $table->date('DOB');
            $table->string('email');
            $table->integer('phone');
            $table->string('work_number');
            $table->string('address');
            $table->integer('request_amount');
            $table->string('username');

            $table->string('status')->nullable()->default('under-review');


            $table->bigInteger('account_number')->unsigned()->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->decimal('current_balance', 10, 2)->nullable();
            $table->integer('authorizations')->nullable();
            $table->decimal('credit_remaining', 10, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->date('cycle_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_of_credit');
    }
};
