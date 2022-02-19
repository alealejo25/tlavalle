<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoEmpleado extends Model
{
    protected $table="empleados";

    protected $primaryKeys='id';

    protected $fillable = [
    'nrocomprobante',
    'fecha',
    'monto',
    'saldo',
    'mes',
    'año',
    'empleado_id',
    'sueldoanterior',
    'sueldoactual',
    'forma'
  
    ];
    public function Empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
    
    
}
