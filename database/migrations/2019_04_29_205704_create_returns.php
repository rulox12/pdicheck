<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('id_returns');
            $table->integer('id_implementation')->unsigned();
            $table->foreign('id_implementation')->references('id_implementation')->on('implementations');
            $table->dateTime('returns_date')->nullable();
            $table->dateTime('activation_date');
            $table->integer('returns_days');
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
        Schema::dropIfExists('returns');
    }
}
