<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientoPallet;
use App\Cliente;
use App\Chofer;
use App\Articulo;
use App\Movimiento;
use DB;
use Laracasts\Flash\Flash;



class MovimientoPalletController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        $clientes=Cliente::orderBy('nombre', 'ASC')->get();
        $choferes=Chofer::orderBy('nombre', 'ASC')->get();
        return view("movimientos.pallets.index",compact("clientes","choferes"));
    }
     public function store(Request $request)
    {	


 		$campos=[
            'tipo'=>'required',
            'cantidad'=>'required',
            'nrocomprobante'=>'required',
            'cliente_id'=>'required',
            'chofer_id'=>'required',
            'fecha'=>'required'
                   
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

		$datos=new MovimientoPallet(request()->except('_token'));
	    $datos->save();

	    $consultacliente=Cliente::where('id',$request->cliente_id)->get();
	    if($request->tipo=='Egreso')
	    {
	    	$saldofinal=$consultacliente[0]->saldopallet-$request->cantidad;	
	    }
	    else
	    {
	    	$saldofinal=$consultacliente[0]->saldopallet+$request->cantidad;	
	    }
   		
		$actualizarcliente=Cliente::where('id',$request->cliente_id)
               			->update([
                  				'saldopallet'=>$saldofinal
                                 ]);

		flash::success('Comprobante ingresado!!! Nro. de Comprobante '.$request->nrocomprobante);
       return Redirect('movimientos/pallets/')->with('Mensaje','Comprobante ingresado!!!');

    }
}
