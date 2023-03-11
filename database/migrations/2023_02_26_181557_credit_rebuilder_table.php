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

            $table->string('title');
            $table->string('name');
            $table->date('DOB');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->string('term');

            $table->string('status')->nullable()->default('under-review');

            $table->bigInteger('account_number')->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->decimal('monthly_fee', 10, 2)->nullable();
            $table->decimal('amount_saved', 10, 2)->nullable();
            $table->integer('tot_lineOfCr')->unsigned()->nullable();
            $table->integer('tot_payments')->unsigned()->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('amount', 5, 2)->nullable()->default(123.45);

            $table->timestamps();

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
