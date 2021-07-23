<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoPrestamochofer extends Model
{
    protected $table='movimientosprestamos';

    protected $primaryKeys='id';

    protected $fillable = [
    'fechadescuento',
    'cuota',
    'importe',
    'estado',
    'prestamoschoferes_id',
    'condicion'
	];

	 public function PrestamoChofer()
    {
        return $this->belongsTo('App\PrestamoChofer');
    }

}
