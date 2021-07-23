<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anticipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anticipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flete_id')->nullable()->unsigned();
            $table->integer('chofer_id')->unsigned();
            $table->date('fecha');
            $table->decimal('importe',10,2);
            $table->string('nroremito',20);
            $table->string('observacion',80)->nullable();
            $table->string('estado',15);
            $table->timestamps();

            $table->foreign('flete_id')->references('id')->on('fletes');
            $table->foreign('chofer_id')->references('id')->on('choferes');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('anticipos');
    }
}
