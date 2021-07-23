<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prestamoschoferes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamoschoferes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nroremito',15)->nullable();
            $table->string('descripcion',100);
            $table->string('modoprestamo',30);
            $table->decimal('importe',10,2);
            $table->decimal('importerestante',10,2);
            $table->integer('cantcuotas');
            $table->integer('cantcuotasfaltantes');
            $table->decimal('valorcuota',10,2);
            $table->date('fechainicio');
            $table->integer('fechaproximopago');
            $table->date('fecha');
            $table->string('estado',15);

            $table->integer('condicion')->unsigned()->default(0);
            $table->timestamps();
            $table->integer('chofer_id')->unsigned()->nullable();
            $table->integer('caja_id')->unsigned()->nullable();

            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->foreign('caja_id')->references('id')->on('cajas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('prestamoschoferes');
    }
}
