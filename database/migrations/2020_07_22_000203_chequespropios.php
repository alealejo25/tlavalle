<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chequespropios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chequespropios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',15);
            $table->decimal('importe',10,2)->nullable();
            $table->date('fecha');
            $table->string('estado',15);
            $table->integer('banco_id')->unsigned();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->integer('chofer_id')->unsigned()->nullable();
            $table->integer('cuenta_bancaria_propia_id')->unsigned();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->foreign('cuenta_bancaria_propia_id')->references('id')->on('cuentas_bancarias_propias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('chequespropios');
    }
}
