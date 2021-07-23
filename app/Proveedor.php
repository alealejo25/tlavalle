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
        'email1',
        'email2',
        'email3',
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
    public function OrdenPago()
    {
        return $this->hasMany('App\OrdenPago');
    }
    public function CtaCteP()
    {
        return $this->hasMany('App\CtaCteP');
    }

     public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }
    //------------

}
