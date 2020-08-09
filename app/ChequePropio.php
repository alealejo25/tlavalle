<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChequePropio extends Model
{
   protected $table='chequespropios';

    protected $primaryKeys='id';

    protected $fillable = [
    'numero',
    'importe',
    'fecha',
    'estado',
    'banco_id',
    'proveedor_id',
    'cuenta_bancaria_propia_id',
    'condicion'
	];

    public function Banco()
    {
        return $this->belongsTo('App\Banco');
    }
    public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
    public function CuentaBancariaPropio()
    {
        return $this->belongsTo('App\CuentaBancariaPropio');
    }
}
