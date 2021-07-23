<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_entidad',20);
            $table->string('nombre_entidad',35);
            $table->date('fecha_acreditacion');
            $table->string('cant_cuotas',5);
            $table->decimal('monto_solicitado',10,2);
            $table->decimal('tasa_interes_anual',10,2);
            $table->string('modalidad_pago',30);
            $table->string('descripcion',35);
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
       Schema::dropIfExists('prestamos');
    }
}
