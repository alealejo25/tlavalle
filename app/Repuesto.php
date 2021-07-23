<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table="repuestos";

    protected $primaryKeys='id';

    protected $fillable = [
    'codigo',
    'nombre',
    'cantidad',
    'marca',
    'condicion',
    ];

    // public function MantenimientoCRepuesto()
    // {
    //     return $this->hasMany('App\MantenimientoCRepuesto');
    // }

    // public function MantenimientoARepuesto()
    // {
    //     return $this->hasMany('App\MantenimientoARepuesto');
    // }

        public function MantenimientoC()
    {
        return $this->belongsToMany('App\mantenimientoc', 'MantenimientoCManodeObra','repuesto_id','mantenimientoc_id');
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }
    //------------
}
