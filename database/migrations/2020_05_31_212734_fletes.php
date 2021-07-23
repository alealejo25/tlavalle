

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fletes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nroremito',20);
            $table->date('fechainicio');
            $table->date('fechafin')->nullable();
            $table->integer('kminicio');
            $table->integer('kmfin')->nullable();
            $table->integer('kmtransitados')->nullable();
            $table->string('descripciontarifa',150)->nullable();
            $table->decimal('valorflete',8,2)->nullable();
            $table->integer('combustiblegasto')->nullable();
            $table->integer('combustibledestino')->nullable();
            $table->integer('combustibletucuman')->nullable();
            $table->decimal('promedio',10,2)->default(0);
            $table->decimal('montoaliquidar',10,2)->nullable();
            $table->string('estado',60);
            $table->integer('camion_id')->unsigned()->nullable();
            $table->integer('chofer_id')->unsigned()->nullable();
            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('camion_id')->references('id')->on('camiones');
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
        Schema::dropIfExists('fletes');
    }
}
