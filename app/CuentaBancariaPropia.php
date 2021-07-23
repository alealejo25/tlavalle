<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancariaPropia extends Model
{
protected $table="cuentas_bancarias_propias";

    protected $primaryKeys='id';

    protected $fillable = [
    'cbu',
    'alias_cbu',
    'titular',
    'dni',
    'identificacion_tributaria',
    'tipo',
    'condicion'
    ];

    public function ChequePropio()
    {
        return $this->hasMany('App\ChequePropio');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('cbu','LIKE',"%$name%");
    }
    //------------

}
