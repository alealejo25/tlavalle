<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CierreCaja extends Model
{
	protected $table="cierrescajas";

    protected $primaryKeys='id';

    protected $fillable = [
    'fecha',
    'descripcion',
    'gastosvarios',
    'dinerocaja',
    'dinerofisico',
    'diferencia',
    'iniciales',
    'pagos',
    'transferencias',
    'cobrocheques',
    'caja_id'

    ];


    public function Caja()
    {
        return $this->belongsTo('App\Caja');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('fecha','LIKE',"%$name%");
    }
    //------------

}


