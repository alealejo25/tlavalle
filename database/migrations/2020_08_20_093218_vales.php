<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('vales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flete_id')->unsigned();
            $table->integer('estacion_id')->unsigned()->nullable();
            $table->date('fecha');
            $table->integer('cantidad');
            $table->string('nroremitovale',20);
            $table->string('nroremitoestacion',20)->nullable();
            $table->string('estado',60)->nullable();
            $table->string('observacion',120)->nullable();
            $table->timestamps();

            $table->foreign('flete_id')->references('id')->on('fletes');
            $table->foreign('estacion_id')->references('id')->on('estaciones');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('vales');
    }
}
