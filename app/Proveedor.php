<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedores";

    protected $primaryKeys='id';

    protected $fillable = [
	    'nombre',
	    'direccion',
	    'telefono',
	    'contacto',
	    'telefono_contacto',
	    'cuit',
	    'saldo',
	    'condicion'
	];

	public function CuentaBancariaProveedor()
    {
        return $this->hasMany('App\CuentaBancariaProveedor');
    }
    public function ChequeTercero()
    {
        return $this->hasMany('App\ChequeTercero');
    }
    public function ChequePropio()
    {
        return $this->hasMany('App\ChequePropio');
    }

}
