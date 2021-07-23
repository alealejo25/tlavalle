<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cheques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',15);
            $table->decimal('importe',10,2);
            $table->date('fecha');
            $table->string('estado',15);
            $table->integer('bancos_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('proveedores_id')->unsigned();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('bancos_id')->references('id')->on('bancos');
            $table->foreign('clientes_id')->references('id')->on('clientes');
            $table->foreign('proveedores_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('cheques');
    }
}
