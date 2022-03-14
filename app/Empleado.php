<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
 protected $table="empleados";

    protected $primaryKeys='id';

    protected $fillable = [
        'id',
    'nombre',
    'apellido',
    'dni',
    'direccion',
    'fechanac',
    'nrocelular',
    'area',
    'sueldoanterior',
    'sueldoactual',
    'fechaingreso',
    'foto',
    'saldo'

    ];
    public function PagoEmpleado()
    {
        return $this->hasMany('App\PagoEmpleado');
    }
    
    public function scopeSearch($query,$name)
    {
        return $query->where('nombre','LIKE',"%$name%");
    }

}
