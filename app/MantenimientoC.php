<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoC extends Model
{
	protected $table='mantenimientosc';

    protected $primaryKeys='id';

    protected $fillable = [
    'fechainicio',
    'fechafin',
    'observacion',
    'estado',
    'camion_id',
    'empleado_id',
    'condicion'
	];

	public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }

    /*public function Empleado()
    {
        return $this->belongsTo('App\Empleado');
    }*/

    public function ManoObra()
    {
        return $this->belongsToMany('App\ManoObra', 'MantenimientoCManodeObra','mantenimientoc_id','manodeobra_id');
    }
    public function Repuesto()
    {
        return $this->belongsToMany('App\Repuesto', 'MantenimientoCManodeObra','mantenimientoc_id','repuesto_id');
    }
}

