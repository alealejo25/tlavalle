<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento_Articulo extends Model
{
    protected $table="movimientos_articulos";

    protected $primaryKeys='id';

    protected $fillable = [
	    'movimiento_id',
	    'articulo_id',
	    'cantidad',
	 ];

     public function Movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }
    public function CuentaBancariaProveedor()
    {
        return $this->hasMany('App\CuentaBancariaProveedor');
    }
}
