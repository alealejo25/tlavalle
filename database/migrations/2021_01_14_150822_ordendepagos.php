<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ordendepagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('ordendepagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->decimal('montoacumulado',12,2)->nullable();
            $table->decimal('montofinal',12,2)->nullable();
            $table->date('fecha');
            $table->string('tipo',20);
            $table->string('estado',15);
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->integer('chofer_id')->unsigned()->nullable();

            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('chofer_id')->references('id')->on('choferes');
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
        Schema::dropIfExists('ordendepagos');
    }
}
