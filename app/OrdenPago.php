<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPago extends Model
{
	protected $table='ordendepagos';

    protected $primaryKeys='id';

    protected $fillable = [
    'numero',
    'montofinal',
    'fecha',
    'tipo',
    'estado',
    'proveedor_id',
    'ordendepago_id',
    'chofer_id'

	];

	public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
   	public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
    public function MovimientoOPC()
    {
        return $this->hasMany('App\MovimientoOPC');
    }

    public function MovimientoOPP()
    {
        return $this->hasMany('App\MovimientoOPP');
    }
}
