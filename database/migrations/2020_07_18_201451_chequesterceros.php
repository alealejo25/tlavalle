<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chequesterceros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chequesterceros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',30);
            $table->decimal('importe',10,2);
            $table->date('fecha');
            $table->string('estado',30);
            $table->integer('cliente_id')->unsigned();
            $table->integer('banco_id')->unsigned();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->integer('chofer_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('chequesterceros');
    }
}
