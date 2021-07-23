<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoPallet extends Model
{
 	protected $table="movimientospallets";

    protected $primaryKeys='id';

    protected $fillable = [
	    'nrocomprobante',
	    'tipo',
	    'cliente_id',
	    'chofer_id',
        'cantidad',
        'descripcion',
	    'fecha',
	 ];



public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
}
