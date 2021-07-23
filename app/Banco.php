<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
   protected $table='bancos';

    protected $primaryKeys='id';

    protected $fillable = [
    'denominacion',
    'condicion'
    ];

    public function ChequeTercero()
    {
        return $this->hasMany('App\ChequeTercero');
    }
    public function ChequePropio()
    {
        return $this->hasMany('App\ChequePropio');
    }
    public function scopeSearch($query,$name)
    {
        return $query->where('denominacion','LIKE',"%$name%");
    }
    //------------

}
