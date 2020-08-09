<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    protected $table="estaciones";

    protected $primaryKeys='id';

    protected $fillable = [
	    'nombre',
	    'direccion',
	    'telefono',
	    'contacto',
	    'telefono_contacto',
	    'cuit',
	    'saldo',
	    'condicion'
	];
	
}
