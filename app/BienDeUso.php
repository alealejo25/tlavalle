<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienDeUso extends Model
{
    protected $table='bienes_de_uso';

    protected $primaryKeys='id';

    protected $fillable = [
    'codigo',
    'descripcion',
    'fecha_ingreso',
    'fecha_egreso',
    'valor',
    'amortizacion',
    'condicion'
	];
}
