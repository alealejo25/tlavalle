<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimientoscmanodeobra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('mantenimientoscmanodeobra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mantenimientoc_id')->unsigned();
            $table->integer('manodeobra_id')->unsigned();
            $table->timestamps();

            $table->foreign('mantenimientoc_id')->references('id')->on('mantenimientosc');
            $table->foreign('manodeobra_id')->references('id')->on('manosdeobras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('mantenimientoscmanodeobra');
    }
}
