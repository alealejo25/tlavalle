<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',25);
            $table->string('apellido',25);
            $table->string('dni',25);
            $table->string('direccion',100);
            $table->date('fechanac');
            $table->string('nrocelular',11);
            $table->string('area',11);
            $table->decimal('sueldoanterior',12,2)->default(0);
            $table->decimal('sueldoactual',12,2)->default(0);
            $table->decimal('saldo',12,2)->default(0);
            $table->string('foto',256)->nullable();
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
       Schema::dropIfExists('empleados');
    }
}
