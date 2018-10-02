<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodImplementationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_method_implementations', function (Blueprint $table) {
            $table->increments('id_payment_method_implementations');
            $table->integer('id_implementation')->unsigned();
            $table->foreign('id_implementation')->references('id_implementation')->on('implementations');
            $table->integer('id_payment_methods')->unsigned();
            $table->foreign('id_payment_methods')->references('id_payment_methods')->on('payment_methods');
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
        Schema::dropIfExists('payment_method_implementations');
    }
}
