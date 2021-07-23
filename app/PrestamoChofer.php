<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestamoChofer extends Model
{
	protected $table='prestamoschoferes';

    protected $primaryKeys='id';

    protected $fillable = [
    'nroremito',
    'descripcion',
    'modoprestamo',
    'importe',
    'importerestante',
    'cantcuotas',
    'cantcuotasfaltantes',
    'valorcuota',
    'fechainicio',
    'fechaproximopago',
    'fecha',
    'estado',
    'condicion',
    'chofer_id',
    'caja_id',
	];

	public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
    public function Caja()
    {
        return $this->belongsTo('App\Caja');
    }
    public function MovimientoPrestamochofer()
    {
        return $this->hasMany('App\MovimientoPrestamochofer');
    }
}
