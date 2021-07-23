<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoARepuesto extends Model
{
	protected $table='mantenimientosarepuestos';

    protected $primaryKeys='id';

    protected $fillable = [
    'movimientoa_id',
    'repuesto_id'
	];

    public function MovimientoA()
    {
        return $this->belongsTo('App\MovimientoA');
    }
    public function Repuesto()
    {
        return $this->belongsTo('App\Repuesto');
    }
}
