<?php

namespace App\Http\Controllers;
use App\MovimientoCaja;
use App\Camion;
use App\Flete;
use App\PrestamoChofer;
use App\MovimientoPrestamoChofer;
use App\ChequePropio;
use App\Cliente;

use Carbon\Carbon;

use Illuminate\Http\Request;

class InicioController extends Controller
{   
 	
    public function index()
    {

         $date = new \DateTime();
        //$datos['estaciones']=Estacion::orderBy('nombre','DESC')->paginate(10);
        //return view('abms.estaciones.index',$datos);
        $caja_id1=1;
        $caja_id2=2;
        $consultamovimientos1=MovimientoCaja::where('caja_id', $caja_id1)->orderBy('id','DESC')->limit(1)->get();
        $consultamovimientos2=MovimientoCaja::where('caja_id', $caja_id2)->orderBy('id','DESC')->limit(1)->get();
        $consultamantenimientoscamion=Camion::orderBy('id','DESC')->get();
        $consultafletes=Flete::where('estado','INICIADO')->orderBy('id','DESC')->get();
        $cantidad=count($consultafletes);


        $fecha = Carbon::parse($date);

        //$fecha=$date->format('d-m-Y');
        $fechavencimientos= $fecha->addDay(7);
        $mfecha = $fecha->month;

        $chequespropioporvencer=ChequePropio::whereBetween('fecha',[$date, $fechavencimientos])->get();

        $chequespropioporvencer->each(function($chequespropioporvencer){
          $chequespropioporvencer->chofer;
          $chequespropioporvencer->proveedor;
          $chequespropioporvencer->cuentabancariapropia;
        });


 
        $consultaprestamos=PrestamoChofer::where('estado','INICIADO')->orderBy('id','DESC')->get();
        $consultapallet=Cliente::sum('saldopallet');
        $consultacamion=Camion::where('condicion','1')->orderBy('id','DESC')->get();

        return view('index')
        ->with('consultamovimientos1',$consultamovimientos1)
        ->with('consultamovimientos2',$consultamovimientos2)
        ->with('consultamantenimientoscamion',$consultamantenimientoscamion)
        ->with('consultaprestamos',$consultaprestamos)
        ->with('mfecha',$mfecha)
        ->with('consultapallet',$consultapallet)
        ->with('chequespropioporvencer',$chequespropioporvencer)
        ->with('consultacamion',$consultacamion)
        ->with('cantidad',$cantidad);

    }

}
