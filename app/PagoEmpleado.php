<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoEmpleado extends Model
{
    protected $table="pagosempleados";

    protected $primaryKeys='id';

    protected $fillable = [
    'nrocomprobante',
    'fecha',
    'monto',
    'saldo',
    'mes',
    'año',
    'empleado_id',
    'forma',
    'observacion',
    'empleado_id'
  
    ];
    public function Empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
    
    
}
