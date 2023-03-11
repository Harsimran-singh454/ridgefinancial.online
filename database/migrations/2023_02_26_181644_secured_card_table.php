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

            $table->bigInteger('account_number')->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->decimal('current_balance', 10, 2)->nullable();
            $table->integer('authorizations')->nullable();
            $table->decimal('credit_remaining', 10, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->date('cycle_date')->nullable();
            $table->integer('transactions')->nullable();
            $table->bigInteger('card_number')->nullable();
            $table->integer('pin_number')->nullable();

            $table->string('status')->nullable()->default('under-review');



            $table->string('name')->nullable();
            $table->string('name_card')->nullable();
            $table->date('DOB')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('request_limit')->nullable();
            $table->string('cred_card_inst')->nullable();
            $table->string('transfer_amount')->nullable();
            $table->string('acc_number')->nullable();

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');

            $table->string('approved')->default('no');
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
