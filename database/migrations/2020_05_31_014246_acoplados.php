<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acoplados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoplados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dominio',10);
            $table->string('modelo',25);
            $table->string('marca',25);
            $table->integer('año');
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_egreso')->nullable();
            $table->integer('valor');
            $table->float('amortizacion',4,2);
            $table->string('foto',256)->nullable();
            $table->integer('condicion')->unsigned()->default(0);
            $table->integer('camion_id')->unsigned()->nullable();
            $table->timestamps();


             $table->foreign('camion_id')->references('id')->on('camiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('acoplados');
    }
}
