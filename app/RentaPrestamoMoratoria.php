<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentaPrestamoMoratoria extends Model
{
	protected $table='rentas_prestamos_moratorias';

    protected $primaryKeys='id';

    protected $fillable = [
    'tipo',
    'tipo_plan',
    'descripcion',
    'monto_declarado',
    'cant_cuotas',
    'fecha_primera_cuota',
    'fecha_ultima_cuota',
    'condicion'
	];

    public function scopeSearch($query,$name)
    {
        return $query->where('descripcion','LIKE',"%$name%");
    }
    //------------

}
