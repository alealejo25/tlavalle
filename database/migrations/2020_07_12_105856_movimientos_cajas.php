<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovimientosCajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('movimientos_cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',20);
            $table->string('tipo_movimiento',10);
            $table->string('descripcion',50);
            $table->date('fecha');
            $table->integer('importe');
            $table->integer('importe_final');
            $table->integer('caja_id')->unsigned();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('caja_id')->references('id')->on('cajas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos_cajas');
    }
}
