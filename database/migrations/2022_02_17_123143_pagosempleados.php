<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagosempleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagosempleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nrocomprobante',20);
            $table->date('fecha');
            $table->decimal('monto',12,2);
            $table->decimal('saldo',12,2);
            $table->integer('mes')->unsigned();
            $table->integer('año')->unsigned();
            $table->string('forma',20);
            $table->integer('empleado_id')->unsigned();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();
            
            $table->foreign('empleado_id')->references('id')->on('empleados');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagosempleados');
    }
}
