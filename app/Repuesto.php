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
}
