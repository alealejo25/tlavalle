<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoCaja extends Model
{
	protected $table="movimientos_cajas";

    protected $primaryKeys='id';

    protected $fillable = [
    'tipo',
    'tipo_movimiento',
    'descripcion',
    'fecha',
    'importe',
    'importe_final',
    'caja_id',
    'condicion'
    ];

    public function Caja()
    {
        return $this->belongsTo('App\Caja');
    }


 }
