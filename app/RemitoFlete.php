<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemitoFlete extends Model
{
protected $table='remitosfletes';

    protected $primaryKeys='id';

    protected $fillable = [
    'nroremito',
    'observacion',
    'palletentregados',
    'palletdevueltos',
    'valepalletdevueltos',
    'clientepalletdevuelto',
    'estado',
    'modo',
    'cliente_id',
    'flete_id'
    ];

	public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function Flete()
    {
        return $this->belongsTo('App\Flete');
    }
 
}



