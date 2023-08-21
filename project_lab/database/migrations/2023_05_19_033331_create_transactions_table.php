<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            $table->string('user_name');
            $table->string('item_name');
            $table->integer('item_price');
            // $table->foreignId('item_id');
            $table->string('transaction_id');
            $table->date('transaction_date');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
