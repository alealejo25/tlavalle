<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculoParticular extends Model
{
    protected $table='vehiculos_particulares';

    protected $primaryKeys='id';

    protected $fillable = [
    'dominio',
    'modelo',
    'marca',
    'año',
    'km',
    'fecha_ingreso',
    'fecha_egreso',
    'valor',
    'amortizacion',
    'foto',
    'condicion'
	];

    public function scopeSearch($query,$name)
    {
        return $query->where('dominio','LIKE',"%$name%");
    }
    //------------

}
