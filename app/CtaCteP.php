<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CtaCteP extends Model
{
    protected $table="ctasctesp";

    protected $primaryKeys='id';

    protected $fillable = [
	    'tipocomprobante',
	    'nrocomprobante',
	    'fechaemision',
	    'fechavencimiento',
	    'debe',
        'haber',
        'acumulado',
        'importesubtotal',
        'iva',
		'percepcioniva',
		'ingresobruto',
		'tem',
		'ganancia',
		'importefinal',
	    'observacion',
	    'estado',
	    'proveedor_id',
	    'factura_id'

	];
	public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
}
