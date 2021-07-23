<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="clientes";

    protected $primaryKeys='id';

    protected $fillable = [
	    'nombre',
	    'direccion',
	    'provincia',
	    'localidad',
	    'telefono',
        'email1',
        'email2',
        'email3',
	    'contacto',
	    'telefono_contacto',
	    'cuit',
	    'saldo',
	    'clientepallet',
	    'saldopallet',
	    'condicion'
	];
	 public function Articulo()
    {
        return $this->hasMany('App\Articulo');
    }
     public function Tarifa()
    {
        return $this->hasMany('App\Tarifa');
    }
    public function Movimiento()
    {
        return $this->hasMany('App\Movimiento');
    }
    public function MovimientoPallet()
    {
        return $this->hasMany('App\MovimientoPallet');
    }
    public function ChequeTercero()
    {
        return $this->hasMany('App\ChequeTercero');
    }

    public function RemitoFlete()
    {
        return $this->hasMany('App\RemitoFLete');
    }
    public function CtaCteC()
    {
        return $this->hasMany('App\CtaCteC');
    }
     public function OrdenPagoC()
    {
        return $this->hasMany('App\OrdenPagoC');
    }
    // PARA BUSCADOR
    public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }
    //------------

}
