<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table='cajas';

    protected $primaryKeys='id';

    protected $fillable = [
    'denominacion',
    'descripcion',
    'condicion'
	];

	 public function MovimientoCaja()
    {
        return $this->hasMany('App\MovimientoCaja');
    }
}
