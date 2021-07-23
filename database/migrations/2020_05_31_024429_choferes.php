<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Choferes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',25);
            $table->string('apellido',25);
            $table->string('dni',25);
            $table->string('direccion',100);
            $table->date('fechanac');
            $table->string('nrocelular',11);
            $table->decimal('saldo',8,2);
            $table->integer('camion_id')->nullable()->unsigned();
            $table->string('foto',256)->nullable();
            $table->integer('condicion')->unsigned()->default(0);

            $table->foreign('camion_id')->references('id')->on('camiones');

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
        Schema::dropIfExists('choferes');
    }
}
