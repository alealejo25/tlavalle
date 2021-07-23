<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimientosc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('mantenimientosc', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechainicio');
            $table->date('fechafin')->nullable();
            $table->string('observacion',100)->nullable();
            $table->string('estado',15);
            $table->integer('camion_id')->unsigned();
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('camion_id')->references('id')->on('camiones');
            //$table->foreign('empleado_id')->references('id')->on('empleados');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('mantenimientosc');
    }
}
