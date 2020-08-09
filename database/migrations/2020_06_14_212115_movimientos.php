<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nro_comprobante',30);
            $table->string('tipo',15);
            $table->integer('cliente_id')->unsigned();
            $table->integer('chofer_id')->unsigned();
            $table->string('receptor_mercaderia',50);
            $table->date('fecha');
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
        Schema::dropIfExists('movimientos');//
    }
}
