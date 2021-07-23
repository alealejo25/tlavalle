<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimientosarepuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientosarepuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mantenimientoa_id')->unsigned();
            $table->integer('repuesto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign('mantenimientoa_id')->references('id')->on('mantenimientosa');
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
        Schema::dropIfExists('mantenimientosarepuestos');
    }
}
