<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimientosopc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientosopc', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('importe',8,2);
            $table->string('forma',20);
            $table->string('nroinstrumento',20)->nullable();
            $table->string('estado',15)->nullable();
            $table->integer('ordendepago_id')->unsigned();
            $table->date('fecha');

            $table->foreign('ordendepago_id')->references('id')->on('ordendepagos');
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
        Schema::dropIfExists('movimientosopc');
    }
}
