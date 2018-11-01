<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailImplementationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_implementations', function (Blueprint $table) {
            $table->increments('id_detail_implementations');
            $table->integer('id_implementation')->unsigned();
            $table->foreign('id_implementation')->references('id_implementation')->on('implementations');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id_item')->on('items');
            $table->string('status');
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('detail_implementations');
    }
}
