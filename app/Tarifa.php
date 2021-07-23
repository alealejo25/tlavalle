<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table='tarifas';

    protected $primaryKeys='id';

    protected $fillable = [
    'descripcion',
    'importe',
    'cliente_id',
    'condicion'
	];

	 public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('descripcion','LIKE',"%$name%");
    }
    //------------


}



