<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table='camiones';

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
    'ultimoservice',
    'proximoservicecaja',
    'proximoservicediferencial',
    'proximoservicemotor',
    'condicion'
	];

    public function Acoplado()
    {
        return $this->hasOne('App\Acoplado');
    }
    public function Chofer()
    {
        return $this->hasOne('App\Chofer');
    }
    public function MantenimientoC()
    {
        return $this->hasMany('App\MantenimientoC');
    }
    public function Flete()
    {
        return $this->hasMany('App\Flete');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('dominio','LIKE',"%$name%");
    }
    //------------

}


