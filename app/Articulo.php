<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table="articulos";

    protected $primaryKeys='id';

    protected $fillable = [
    'codigo',
    'nombre',
    'categoria_id',
    'cantidad',
    'cliente_id',
    'condicion'
    ];
    public function Categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function Movimiento()
    {
        return $this->belongsToMany('App\Movimiento', 'movimientos_articulos','articulo_id','movimiento_id');
    }

    public function Movimiento_Articulo()
    {
        return $this->hasMany('App\Movimiento_Articulo');
    }

        // PARA BUSCADOR
    public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }
    //------------

}
