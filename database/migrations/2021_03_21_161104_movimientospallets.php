<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimientospallets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('movimientospallets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nrocomprobante',20);
            $table->integer('cliente_id')->unsigned();
            $table->integer('chofer_id')->unsigned();
            $table->string('tipo',15);
            $table->string('descripcion',40)->nullable();;
            $table->date('fecha');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('chofer_id')->references('id')->on('choferes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('movimientospallets');
    }
}
