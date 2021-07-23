<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantenimientoAManodeObra extends Model
{
	protected $table='mantenimientosamanodeobra';

    protected $primaryKeys='id';

    protected $fillable = [
    'movimientoa_id',
    'manodeobra_id'
	];

	public function MovimientoA()
    {
        return $this->belongsTo('App\MovimientoA');
    }
    public function ManoObra()
    {
        return $this->belongsTo('App\ManoObra');
    }
}
