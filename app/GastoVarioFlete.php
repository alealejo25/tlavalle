<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GastoVarioFlete extends Model
{

		protected $table="gastosvariosfletes";

    protected $primaryKeys='id';

    protected $fillable = [
    'flete_id',
    'descripcion',
    'fecha',
    'importe'
    
	];
	public function Flete()
    {
        return $this->belongsTo('App\Flete');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('descripcion','LIKE',"%$name%");
    }
    //------------

}
