<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCRepuesto extends Model
{
	protected $table='mantenimientoscrepuestos';

    protected $primaryKeys='id';

    protected $fillable = [
    'mantenimientoc_id',
    'repuesto_id',
    'cantidad'
	];

    // public function MantenimientoC()
    // {
    //     return $this->belongsTo('App\MantenimientoC');
    // }
    // public function Repuesto()
    // {
    //     return $this->belongsTo('App\Repuesto');
    // }
}


