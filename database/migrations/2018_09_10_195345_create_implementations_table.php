<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImplementationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementations', function (Blueprint $table) {
            $table->increments('id_implementation');
            $table->integer('id_site')->unsigned();
            $table->foreign('id_site')->references('id_site')->on('sites');
            $table->integer('id_type_integration')->unsigned();
            $table->foreign('id_type_integration')->references('id_type_integration')->on('type_integrations');
            $table->integer('leader')->unsigned();
            $table->foreign('leader')->references('id')->on('users');
            $table->integer('engineer')->unsigned();
            $table->foreign('engineer')->references('id')->on('users');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->decimal('progress', 3,1);
            $table->string('compensation');
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
        Schema::dropIfExists('implementations');
    }
}
