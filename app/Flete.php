<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flete extends Model
{
    protected $table="fletes";

    protected $primaryKeys='id';

    protected $fillable = [
    'nroremito',
    'fechainicio',
    'fechafin',
    'kminicio',
    'kmfin',
    'kmtransitados',
    'descripciontarifa',
    'valorflete',
    'combustiblegasto',
    'combustibledestino',
    'combustibletucuman',
    'promedio',
    'montoaliquidar',
    'estado',
    'chofer_id',
    'camion_id',
    'condicion'
	];


public function Anticipo()
    {
        return $this->hasMany('App\Anticipo');
    }
public function Vale()
    {
        return $this->hasMany('App\Vale');
    }

public function GastoVarioFlete()
    {
        return $this->hasMany('App\GastoVarioFlete');
    }
public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }
public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('nroremito','LIKE',"%$name%");
    }

public function RemitoFlete()
    {
        return $this->hasMany('App\RemitoFLete');
    }
    //------------

}
