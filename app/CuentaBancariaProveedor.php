<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancariaProveedor extends Model
{
protected $table="cuentas_bancarias_proveedores";

    protected $primaryKeys='id';

    protected $fillable = [
    'cbu',
    'alias_cbu',
    'titular',
    'dni',
    'identificacion_tributaria',
    'tipo',
    'proveedor_id',
    'condicion'
    ];
    public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('cbu','LIKE',"%$name%");
    }
    //------------

}
