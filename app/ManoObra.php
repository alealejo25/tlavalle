<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManoObra extends Model
{
	protected $table='manosdeobras';

    protected $primaryKeys='id';

    protected $fillable = [
    	'denominacion',
    	'condicion'
    ];

    // public function MantenimientoCManodeObra()
    // {
    //     return $this->hasMany('App\MantenimientoCManodeObra');
    // }

    // public function MantenimientoAManodeObra()
    // {
    //     return $this->hasMany('App\MantenimientoAManodeObra');
    // }

        public function MantenimientoC()
    {
        return $this->belongsToMany('App\ManoObra', 'MantenimientoCManodeObra','mantenimientoc_id','manodeobra_id');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('denominacion','LIKE',"%$name%");
    }
    //------------

}
