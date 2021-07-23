<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',60);
            $table->string('direccion',60);
            $table->string('provincia',40);
            $table->string('localidad',60);
            $table->string('telefono',11);
            $table->string('email1',60);
            $table->string('email2',60)->nullable();
            $table->string('email3',60)->nullable();
            $table->string('contacto',120);
            $table->string('telefono_contacto',120);
            $table->string('cuit',15);
            $table->decimal('saldo',10,2)->default(0);
            $table->string('clientepallet',2)->default(0);
            $table->integer('saldopallet')->nullable();
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
       Schema::dropIfExists('clientes');//
    }
}
