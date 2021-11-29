<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ctasctesp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
         Schema::create('ctasctesp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipocomprobante',20);
            $table->string('nrocomprobante',20);
            $table->date('fechaemision');
            $table->date('fechavencimiento')->nullable();
            $table->decimal('debe',12,2);
            $table->decimal('haber',12,2);
            $table->decimal('acumulado',12,2);
            $table->decimal('importesubtotal',12,2)->nullable();
            $table->decimal('iva',12,2)->nullable();
            $table->decimal('percepcioniva',12,2)->nullable();
            $table->decimal('ingresobruto',12,2)->nullable();
            $table->decimal('tem',12,2)->nullable();
            $table->decimal('ganancia',12,2)->nullable();
            $table->decimal('importefinal',12,2)->nullable();


            $table->string('observacion',150)->nullable();
            $table->string('estado',30)->nullable();
            $table->integer('proveedor_id')->unsigned();
            $table->integer('factura_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('factura_id')->references('id')->on('ctasctesp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('ctasctesp');
    }
}
