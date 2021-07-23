<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CtaCteCho extends Model
{
    protected $table="ctasctescho";

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
	    'chofer_id',
	    'factura_id'
	];
	public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }

}
