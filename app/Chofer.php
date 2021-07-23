<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table="choferes";

    protected $primaryKeys='id';

    protected $fillable = [
    'nombre',
    'apellido',
    'dni',
    'direccion',
    'fechanac',
    'nrocelular',
    'saldo',
    'camion_id'
	];
	public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }
    public function Movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }
        public function MovimientoPallet()
    {
        return $this->hasMany('App\MovimientoPallet');
    }
    public function PrestamoChofer()
    {
        return $this->hasMany('App\PrestamoChofer');
    }
    public function Flete()
    {
        return $this->hasMany('App\Flete');
    }
    public function Anticipo()
    {
        return $this->hasMany('App\Anticipo');
    }
    public function OrdenPago()
    {
        return $this->hasMany('App\OrdenPago');
    }
    public function ChequePropio()
    {
        return $this->hasMany('App\ChequePropio');
    }

    public function CtaCteCho()
    {
        return $this->hasMany('App\CtaCteCho');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }


    //------------

}



