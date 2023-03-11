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
        Schema::create('loan', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('name');
            $table->date('DOB');
            $table->string('email');
            $table->integer('phone');
            $table->string('work_number');
            $table->string('address');
            $table->integer('loan_amount');
            $table->string('purpose');

            $table->string('status')->nullable()->default('under-review');


            $table->bigInteger('account_number')->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->integer('account_balance')->unsigned();
            $table->date('due_date')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            $table->integer('frequency')->nullable();
            $table->decimal('current_balance', 10, 2)->nullable();
            $table->decimal('interest_rate', 10, 2)->nullable();
            $table->string('term')->nullable();
            $table->decimal('payment', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan');
    }
};
