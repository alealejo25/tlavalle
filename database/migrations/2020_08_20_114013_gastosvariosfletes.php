<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gastosvariosfletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('gastosvariosfletes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flete_id')->unsigned();
            $table->string('descripcion',60)->nullable();;
            $table->date('fecha');
            $table->decimal('importe',12,2);
            $table->timestamps();

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

         Schema::dropIfExists('gastosvariosfletes');
    }
}
