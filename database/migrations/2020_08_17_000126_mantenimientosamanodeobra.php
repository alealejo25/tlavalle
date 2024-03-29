<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimientosamanodeobra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientosamanodeobra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mantenimientoa_id')->unsigned();
            $table->integer('manodeobra_id')->unsigned();
            $table->timestamps();

            $table->foreign('mantenimientoa_id')->references('id')->on('mantenimientosa');
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
         Schema::dropIfExists('mantenimientosamanodeobra');
    }
}
