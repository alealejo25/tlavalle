<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table="movimientos";

    protected $primaryKeys='id';

    protected $fillable = [
	    'nro_comprobante',
	    'tipo',
	    'cliente_id',
	    'chofer_id',
        'receptor_mercaderia',
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
   	public function Articulo()
    {
        return $this->belongsToMany('App\Articulo', 'movimientos_articulos','movimiento_id','articulo_id');
    }
}
