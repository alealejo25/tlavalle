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
    public function ChequeTercero()
    {
        return $this->hasMany('App\ChequeTercero');
    }

}
