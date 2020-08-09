<?php

namespace App\Http\Controllers;
use App\MovimientoCaja;

use Illuminate\Http\Request;

class InicioController extends Controller
{
 	public function index()
    {
        //$datos['estaciones']=Estacion::orderBy('nombre','DESC')->paginate(10);
        //return view('abms.estaciones.index',$datos);
        $caja_id1=1;
        $caja_id2=2;
        $consultamovimientos1=MovimientoCaja::where('caja_id', $caja_id1)->orderBy('id','DESC')->limit(1)->get();
        $consultamovimientos2=MovimientoCaja::where('caja_id', $caja_id2)->orderBy('id','DESC')->limit(1)->get();
        return view('index')
        ->with('consultamovimientos1',$consultamovimientos1)
        ->with('consultamovimientos2',$consultamovimientos2);

    }

}
