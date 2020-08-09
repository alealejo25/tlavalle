<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Camiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nro_unidad');
            $table->string('dominio',10);
            $table->string('modelo',25);
            $table->string('marca',25);
            $table->integer('año');
            $table->integer('km');
            $table->date('ultimoservice');
            $table->integer('proximoservice');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
            $table->integer('valor');
            $table->float('amortizacion',4,2);
            $table->string('foto',256)->nullable();
            $table->integer('condicion')->unsigned()->default(0);
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
       
        Schema::dropIfExists('camiones');
    }
}
