<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfipPrestamoMoratoria extends Model
{
	protected $table='afip_prestamos_moratorias';

    protected $primaryKeys='id';

    protected $fillable = [
    'tipo',
    'impuesto',
    'monto_declarado',
    'cant_cuotas',
    'fecha_primera_cuota',
    'fecha_ultima_cuota',
    'condicion'
	];

    public function scopeSearch($query,$name)
    {
        return $query->where('impuesto','LIKE',"%$name%");
    }
    //------------

}
