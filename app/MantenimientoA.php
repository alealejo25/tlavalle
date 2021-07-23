<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoA extends Model
{
  	protected $table='mantenimientosa';

    protected $primaryKeys='id';

    protected $fillable = [
    'fechainicio',
    'fechafin',
    'observacion',
    'estado',
    'acoplado_id',
    'empleado_id',
    'condicion'
	];

	public function Acoplado()
    {
        return $this->belongsTo('App\Acoplado');
    }

    public function MantenimientoAManodeObra()
    {
        return $this->hasMany('App\MantenimientoAManodeObra');
    }
    public function MantenimientoARepuesto()
    {
        return $this->hasMany('App\MantenimientoARepuesto');
    }



}
