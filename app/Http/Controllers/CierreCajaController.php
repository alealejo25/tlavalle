<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caja;
use App\GastoVarioFlete;
use App\CierreCaja;
use App\MovimientoCaja;
use Laracasts\Flash\Flash;

class CierreCajaController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
	public function create()
    {
        $cajas=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
        return view('finanzas.cierrecajas.create')
        ->with('cajas',$cajas);
    }
    
    public function store(Request $request)
    {

         /*VALIDACION -----------------------------------------*/
        $campos=[
            'descripcion'=>'required|string|max:50',
            'dinerofisico'=>'required|numeric',
            'fecha'=>'required',
            'caja_id'=>'required'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

    	$datosCierreCaja=new CierreCaja(request()->except('_token'));

    	$datosGastosVarios= MovimientoCaja::where('caja_id',$request->caja_id)->where('tipo','GASTOS VARIOS')->where('cierre','0')->sum('importe');

        $datoseliminacionanticipo= MovimientoCaja::where('caja_id',$request->caja_id)->where('tipo','ELIMINACION DE ANTICIPO')->where('cierre','0')->sum('importe');


        $datosanticipo= MovimientoCaja::where('caja_id',$request->caja_id)->where('tipo','ANTICIPO')->where('cierre','0')->sum('importe');
        
        $datosinicio= MovimientoCaja::where('caja_id',$request->caja_id)->where('tipo','iniciar')->where('cierre','0')->sum('importe');

        $datoscobrocheques= MovimientoCaja::where('caja_id',$request->caja_id)->where('tipo','COBRO CHEQUE PROPIO')->where('cierre','0')->sum('importe');

        $dinerocaja= MovimientoCaja::where('caja_id',$request->caja_id)->where('cierre','0')->orderBy('id','DESC')->limit(1)->get();

        if(count($dinerocaja==0)){
            flash::success('No puede cerrar la caja, sin antes iniciarla!!!');
            return Redirect('/finanzas/cierrecajas/create');
        }

        $datosCierreCaja->pagos=0;
        $datosCierreCaja->transferencias=0;

//arreglar cuando la caja sea negativa , ahora esta sumando

        $diferencia=$request->dinerofisico-$dinerocaja[0]->importe_final;

        $datosCierreCaja->gastosvarios=$datosGastosVarios;
        $datosCierreCaja->cobrocheques=$datoscobrocheques;
        $datosCierreCaja->diferencia=$diferencia;
        $datosCierreCaja->iniciales=$datosinicio;
        $datosCierreCaja->dinerocaja=$dinerocaja[0]->importe_final;
        $datosCierreCaja->save();

        $datosmovimientos=new MovimientoCaja(request()->except('_token'));
        $datosmovimientos->tipo='CIERRE';
        $datosmovimientos->tipo_movimiento='EGRESO';
        $datosmovimientos->tipo_movimiento='EGRESO';
        $datosmovimientos->importe=$request->dinerofisico;
        $datosmovimientos->importe_final=0;
        $datosmovimientos->cierre=1;
        $datosmovimientos->save();

        $cierre=1;
        
        $actualizarmoviemientos=MovimientoCaja::where('caja_id',$request->caja_id)
                ->update([                          
                          'cierre'=>$cierre
                         ]);
        flash::success('Cierre de caja con exito!!!');
          return Redirect('/');
    }

}