<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    protected $table="iva";

    protected $primaryKeys='id';

    protected $fillable = [
    'descripcion',
    'impuesto',
    'condicion'
    
    ];
}
