<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Remitosfletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('remitosfletes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nroremito',50);
            $table->string('observacion',150)->nullable();
            $table->integer('palletentregados')->default(0);
            $table->integer('palletdevueltos')->default(0);
            $table->string('clientepalletdevuelto',50)->nullable();
            $table->string('valepalletdevueltos',50)->nullable();
            $table->string('estado',15)->nullable();
            $table->string('modo',6);
            $table->integer('cliente_id')->unsigned();
            $table->integer('flete_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('flete_id')->references('id')->on('fletes');
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('remitosfletes');
    }
}
