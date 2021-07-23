<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CierresCajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cierrescajas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('descripcion',50);

            $table->decimal('gastosvarios',10,2);
            $table->decimal('dinerocaja',10,2);
            $table->decimal('dinerofisico',10,2);
            $table->decimal('diferencia',10,2);
            $table->decimal('iniciales',10,2);
            $table->decimal('pagos',10,2);
            $table->decimal('transferencias',10,2);
            $table->decimal('cobrocheques',10,2);
            $table->integer('caja_id')->unsigned();
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
         Schema::dropIfExists('cierrescajas');
    }
}
