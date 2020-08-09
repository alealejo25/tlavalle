<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuentasBancariasProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias_proveedores', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cbu',22);
                $table->string('alias_cbu',60);
                $table->string('titular',60);
                $table->string('dni',60);
                $table->string('identificacion_tributaria',60);
                $table->string('tipo',80);
                $table->integer('proveedor_id')->unsigned();
                $table->integer('condicion')->unsigned()->default(0);
                $table->timestamps();

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
       Schema::dropIfExists('cuentas_bancarias_proveedores');//
    }
}
