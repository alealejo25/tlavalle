
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
	protected $table="cheques";

    protected $primaryKeys='id';

    protected $fillable = [
    'numero',
    'importe',
    'fecha',
    'estado',
    'bancos_id',
    'clientes_id',
    'proveedores_id',
    'condicion'
    ];

    public function Banco()
    {
        return $this->belongsTo('App\Banco');
    }
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function Proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
    
    public function scopeSearch($query,$name)
    {
        return $query->where('numero','LIKE',"%$name%");
    }
    //------------

}
