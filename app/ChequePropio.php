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
    'chofer_id',
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
     public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
    public function CuentaBancariaPropia()
    {
        return $this->belongsTo('App\CuentaBancariaPropia');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('numero','LIKE',"%$name%");
    }
    //------------

}
