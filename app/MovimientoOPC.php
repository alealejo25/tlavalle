<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoOPC extends Model
{
	protected $table='movimientosopc';

    protected $primaryKeys='id';

    protected $fillable = [
    'importe',
    'forma',
    'nroinstrumento',
    'estado',
    'ordendepago_id'
	];

	public function OrdenPago()
    {
        return $this->belongsTo('App\OrdenPago');
    }
}
