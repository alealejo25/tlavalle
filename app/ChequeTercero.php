<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChequeTercero extends Model
{
    protected $table='chequesterceros';

    protected $primaryKeys='id';

    protected $fillable = [
    'numero',
    'importe',
    'fecha',
    'estado',
    'cliente_id',
    'banco_id',
    'proveedor_id',
    'chofer_id'
	];

	 public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function Banco()
    {
        return $this->belongsTo('App\Banco');
    }
    public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
     public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
        public function scopeSearch($query,$name)
    {
        return $query->where('numero','LIKE',"%$name%");
    }
    //------------

}
