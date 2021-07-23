<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('estaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',60);
            $table->string('direccion',100);
            $table->string('telefono',11);
            $table->string('contacto',100);
            $table->string('telefono_contacto',11);
            $table->string('cuit',15)->unique();
            $table->decimal('saldo',8,2)->default(0);
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
         Schema::dropIfExists('estaciones');
    }
}
