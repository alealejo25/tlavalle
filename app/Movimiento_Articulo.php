<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento_Articulo extends Model
{
    protected $table="movimientos_articulos";

    protected $primaryKeys='id';

    protected $fillable = [
	    'movimiento_id',
	    'articulo_id',
        'fecha',
	    'cantidad',
	 ];

    //  public function Movimiento()
    // {
    //     return $this->belongsTo('App\Movimiento');
    // }


    public function Articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
    public function Movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }
}
