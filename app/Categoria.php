<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';

    protected $primaryKeys='id';

    protected $fillable = [
    'nombre',
    'condicion'
    ];

    public function Articulo()
    {
        return $this->hasMany('App\Articulo');
    }
    
}
