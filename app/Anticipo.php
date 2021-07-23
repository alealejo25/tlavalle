<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anticipo extends Model
{

	protected $table="anticipos";

    protected $primaryKeys='id';

    protected $fillable = [
    'flete_id',
    'chofer_id',
    'fecha',
    'importe'
    
	];
	public function Flete()
    {
        return $this->belongsTo('App\Flete');
    }
    public function Chofer()
    {
        return $this->belongsTo('App\Chofer');
    }
}
