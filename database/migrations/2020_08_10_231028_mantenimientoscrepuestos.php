<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimientoscrepuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('mantenimientoscrepuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mantenimientoc_id')->unsigned();
            $table->integer('repuesto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign('mantenimientoc_id')->references('id')->on('mantenimientosc');
            $table->foreign('repuesto_id')->references('id')->on('repuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('mantenimientoscrepuestos');
    }
}
