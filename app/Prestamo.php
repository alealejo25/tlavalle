<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
	protected $table='prestamos';

    protected $primaryKeys='id';

    protected $fillable = [
    'tipo_entidad',
    'nombre_entidad',
    'fecha_acreditacion',
    'cant_cuotas',
    'monto_solicitado',
    'tasa_interes_anual',
    'modalidad_pago',
    'descripcion',
    'condicion'
	];
}
