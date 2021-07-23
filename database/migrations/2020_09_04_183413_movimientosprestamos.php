<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimientosprestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('movimientosprestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechadescuento')->nullable();
            $table->integer('cuota');
            $table->decimal('importe',10,2);
            $table->string('estado');
            $table->integer('prestamoschoferes_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('prestamoschoferes_id')->references('id')->on('prestamoschoferes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('movimientosprestamos');
    }
}
