<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ordendepagosc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordendepagosc', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('nrocomprobante',20);
            $table->decimal('montoneto',12,2);
            $table->string('descripcion',100)->nullable();
            $table->string('provincia1',30)->nullable();
            $table->decimal('ingresobrutos1',12,2)->nullable();
            $table->string('provincia2',30)->nullable();
            $table->decimal('ingresobrutos2',12,2)->nullable();
            $table->string('provincia3',30)->nullable();
            $table->decimal('ingresobrutos3',12,2)->nullable();
            $table->decimal('retencionganancias',12,2)->nullable();
            $table->decimal('suss',12,2)->nullable();
            $table->decimal('otras',12,2)->nullable();
            $table->decimal('montofinal',12,2)->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
            
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
         Schema::dropIfExists('ordendepagosc');
    }
}

