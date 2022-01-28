<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoBruto extends Model
{
    protected $table="ingresosbrutos";

    protected $primaryKeys='id';

    protected $fillable = [
    'provincia',
    'descripcion',
    'impuesto',
    'condicion'
    
    ];
}
