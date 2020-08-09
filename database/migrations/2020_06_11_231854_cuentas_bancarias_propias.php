<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuentasBancariasPropias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias_propias', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cbu',22);
                $table->string('alias_cbu',60);
                $table->string('titular',60);
                $table->string('dni',60);
                $table->string('identificacion_tributaria',60);
                $table->string('tipo',80);
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
       Schema::dropIfExists('cuentas_bancarias_propias');//
    }
}
