<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acoplado extends Model
{
    protected $table="acoplados";

    protected $primaryKeys='id';

    protected $fillable = [
    'dominio',
    'modelo',
    'marca',
    'año',
    'fecha_ingreso',
    'fecha_egreso',
    'valor',
    'amortizacion',
    'camion_id'
	];
    public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }

}

