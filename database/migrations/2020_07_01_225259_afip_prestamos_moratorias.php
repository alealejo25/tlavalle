<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfipPrestamosMoratorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('afip_prestamos_moratorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',20);
            $table->string('impuesto',35);
            $table->decimal('monto_declarado',10,2);
            $table->string('cant_cuotas',5);
            $table->date('fecha_primera_cuota');
            $table->date('fecha_ultima_cuota')->nullable();
            $table->integer('condicion')->unsigned()->default(0);
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
  Schema::dropIfExists('afip_prestamos_moratorias');
    }
}
