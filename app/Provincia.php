<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
 	protected $table='provincias';

    protected $primaryKeys='id';

    protected $fillable = [
    'nombre',
    ];

}
