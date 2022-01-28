<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tem extends Model
{
    protected $table="tem";
    protected $primaryKeys='id';
    protected $fillable = [
    'provincia',
    'impuesto',
    'condicion'
    ];
}