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
}



