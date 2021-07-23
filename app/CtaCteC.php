<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CtaCteC extends Model
{
    protected $table="ctasctesc";

    protected $primaryKeys='id';

    protected $fillable = [
	    'tipocomprobante',
	    'nrocomprobante',
	    'fechaemision',
	    'fechavencimiento',
	    'debe',
        'haber',
        'acumulado',
	    'observacion',
	    'estado',
	    'cliente_id',
	    'factura_id'

	];
	public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
