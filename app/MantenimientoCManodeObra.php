<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCManodeObra extends Model
{
	protected $table='mantenimientoscmanodeobra';

    protected $primaryKeys='id';

    protected $fillable = [
    'mantenimientoc_id',
    'manodeobra_id'
	];

	// public function MovimientoC()
 //    {
 //        return $this->belongsTo('App\MovimientoC');
 //    }
 //    public function ManoObra()
 //    {
 //        return $this->belongsTo('App\ManoObra');
 //    }
}

