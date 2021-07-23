<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPagoC extends Model
{
 	protected $table='ordendepagosc';

    protected $primaryKeys='id';

    protected $fillable = [
    'fecha',
    'nrocomprobante',
    'montoneto',
    'descripcion',
    'provincia1',
    'ingresobrutos1',
    'provincia2',
    'ingresobrutos2',
    'provincia3',
    'ingresobrutos3',
    'suss',
    'otras',
    'montofinal',
    'cliente_id'
	];

	public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    
}
