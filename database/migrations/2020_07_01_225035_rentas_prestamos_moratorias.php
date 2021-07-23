<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RentasPrestamosMoratorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas_prestamos_moratorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',20);
            $table->string('tipo_plan',20);
            $table->string('descripcion',60);
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
       Schema::dropIfExists('rentas_prestamos_moratorias');
    }
}
