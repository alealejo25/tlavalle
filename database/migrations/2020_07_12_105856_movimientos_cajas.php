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
            $table->string('tipo',30);
            $table->string('tipo_movimiento',10);
            $table->string('descripcion',50);
            $table->date('fecha');
            $table->decimal('importe',10,2);
            $table->decimal('importe_final',10,2);
            $table->integer('caja_id')->unsigned();
            $table->integer('cierre')->unsigned()->default(0);
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
