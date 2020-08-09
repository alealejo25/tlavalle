<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table='camiones';

    protected $primaryKeys='id';

    protected $fillable = [
    'dominio',
    'modelo',
    'marca',
    'año',
    'km',
    'fecha_ingreso',
    'fecha_egreso',
    'valor',
    'amortizacion',
    'foto',
    'ultimoservice',
    'proximoservice'
	];

    public function Acoplado()
    {
        return $this->hasOne('App\Acoplado');
    }
    public function Chofer()
    {
        return $this->hasOne('App\Chofer');
    }
}


