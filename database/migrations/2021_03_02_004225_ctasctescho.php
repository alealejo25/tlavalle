<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ctasctescho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctasctescho', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipocomprobante',20);
            $table->string('nrocomprobante',20);
            $table->date('fechaemision');
            $table->date('fechavencimiento')->nullable();
            $table->decimal('debe',10,2);
            $table->decimal('haber',10,2);
            $table->decimal('acumulado',10,2);
            $table->decimal('importesubtotal',10,2)->nullable();
            $table->decimal('iva',10,2)->nullable();
            $table->decimal('percepcioniva',10,2)->nullable();
            $table->decimal('ingresobruto',10,2)->nullable();
            $table->decimal('tem',10,2)->nullable();
            $table->decimal('ganancia',10,2)->nullable();
            $table->decimal('importefinal',10,2)->nullable();

            $table->string('observacion',150)->nullable();
            $table->string('estado',30)->nullable();
            $table->integer('chofer_id')->unsigned();
            $table->integer('factura_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->foreign('factura_id')->references('id')->on('ctasctescho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('ctasctescho');
    }
}
