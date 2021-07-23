<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{

	protected $table="vales";

    protected $primaryKeys='id';

    protected $fillable = [
    'flete_id',
    'fecha',
    'cantidad',
    'estacion_id',
    'nroremitoestacion',
    'nroremitovale'
    
	];
	public function Flete()
    {
        return $this->belongsTo('App\Flete');
    }
    public function Estacion()
    {
        return $this->belongsTo('App\Estacion');
    }

}