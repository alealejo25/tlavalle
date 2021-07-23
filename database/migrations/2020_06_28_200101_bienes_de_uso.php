<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BienesDeUso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_de_uso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',20);
            $table->string('descripcion',60);
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
            $table->integer('valor');
            $table->float('amortizacion',4,2);
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
        Schema::dropIfExists('bienes_de_uso');
    }
}
