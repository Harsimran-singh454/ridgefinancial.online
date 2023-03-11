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
        Schema::create('money_transfer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->string('sender');
            $table->string('receipient');
            $table->string('using');

            $table->bigInteger('card_number')->nullable();
            $table->string('rec_email')->nullable();
            $table->bigInteger('LOC_num')->nullable();
            $table->integer('transit')->nullable();
            $table->tinyInteger('inst_number')->nullable();
            $table->bigInteger('account_number')->nullable();

            $table->longText('details');
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('transferStatus')->nullable()->default('in-progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_transfer');
    }
};
