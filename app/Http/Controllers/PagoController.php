<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use App\Proveedor;
use App\MovimientoCaja;
use App\ChequeTercero;
use App\ChequePropio;
use App\CuentaBancariaPropia;
use App\Chofer;
use App\PrestamoChofer;
use App\Caja;
use App\MovimientoPrestamoChofer;
use App\Anticipo;
use App\OrdenPago;
use App\MovimientoOPC;
use App\MovimientoOPP;
use App\CtaCteP;
use Luecano\NumeroALetras\NumeroALetras;

use Carbon\Carbon;
use DB;


class PagoController extends Controller
{   

   public function prueba(){
    return view('pagos.pagoefectivo')
                ->with('proveedores',$proveedores)
            ->with('datoscaja',$datoscaja);
   }
    public function guardar(Request $request){
        dd($request);
   }

   /*public function __construct()
    {
        $this->middleware('auth');
    }*/
   public function pagoefectivo(){
	 $datoscaja=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
		$proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
    	return view('pagos.pagoefectivo')
        		->with('proveedores',$proveedores)
            ->with('datoscaja',$datoscaja);
   }


   public function pagoefectivochofer($id){
  
    $datosopchofer=OrdenPago::where('id',$id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });
    $datoscaja=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
    return view('pagos.chofer.cargarpagoefectivo')
            ->with('id',$id)
            ->with('datoscaja',$datoscaja)
            ->with('datosopchofer',$datosopchofer);
   }
   public function pagoefectivoproveedor($id){
       $datoscaja=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
    $datosopchofer=OrdenPago::where('id',$id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });
    return view('pagos.proveedor.cargarpagoefectivo')
            ->with('id',$id)
            ->with('datosopchofer',$datosopchofer)
            ->with('datoscaja',$datoscaja);
   }


   public function pagotransferenciachofer($id){
    
    $datosopchofer=OrdenPago::where('id',$id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });
    $cuentasbancariaspropias=CuentaBancariaPropia::orderBy('cbu','ASC')->pluck('cbu','id');


    return view('pagos.chofer.cargarpagotransferencia')
            ->with('id',$id)
            ->with('cuentasbancariaspropias',$cuentasbancariaspropias)
            ->with('datosopchofer',$datosopchofer);
   }

    public function pagotransferenciaproveedor($id){
    
    $datosopproveedor=OrdenPago::where('id',$id)->get();
    $datosopproveedor->each(function($datosopproveedor){
          $datosopproveedor->chofer;
          $datosopproveedor->proveedor;
        });
    $cuentasbancariaspropias=CuentaBancariaPropia::orderBy('cbu','ASC')->pluck('cbu','id');


    return view('pagos.proveedor.cargarpagotransferencia')
            ->with('id',$id)
            ->with('cuentasbancariaspropias',$cuentasbancariaspropias)
            ->with('datosopproveedor',$datosopproveedor);
   }


    

   public function pagochequepropiochofer($id){
    
    $datosopchofer=OrdenPago::where('id',$id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });

    $estado='DISPONIBLE';
    $chequespropio=ChequePropio::where('estado', $estado)->orderBy('numero','ASC')->pluck('numero','id');


    return view('pagos.chofer.cargarpagochequepropio')
            ->with('id',$id)
            ->with('chequespropio',$chequespropio)
            ->with('datosopchofer',$datosopchofer);
   }
   public function    pagochequepropioproveedor($id){
    
    $datosoproveedor=OrdenPago::where('id',$id)->get();
    $datosoproveedor->each(function($datosopproveedor){
          $datosopproveedor->proveedor;
        });

    $estado='DISPONIBLE';
    $chequespropio=ChequePropio::where('estado', $estado)->orderBy('numero','ASC')->pluck('numero','id');


    return view('pagos.proveedor.cargarpagochequepropio')
            ->with('id',$id)
            ->with('chequespropio',$chequespropio)
            ->with('datosoproveedor',$datosoproveedor);
   }



   public function pagochequetercerochofer($id){
    
    $datosopchofer=OrdenPago::where('id',$id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });

    
    $estado='DISPONIBLE';
    $chequestercero=ChequeTercero::where('estado', $estado)->orderBy('importe','ASC')->pluck('importe','id');


    return view('pagos.chofer.cargarpagochequetercero')
            ->with('id',$id)
            ->with('chequestercero',$chequestercero)
            ->with('datosopchofer',$datosopchofer);
   }
   public function pagochequeterceroproveedor($id){
    
    $datosopproveedor=OrdenPago::where('id',$id)->get();
    $datosopproveedor->each(function($datosopproveedor){
          $datosopproveedor->chofer;
          $datosopproveedor->proveedor;
        });

    
    $estado='DISPONIBLE';
    $chequestercero=ChequeTercero::where('estado', $estado)->orderBy('importe','ASC')->pluck('importe','id');

    return view('pagos.proveedor.cargarpagochequetercero')
            ->with('id',$id)
            ->with('chequestercero',$chequestercero)
            ->with('datosopproveedor',$datosopproveedor);
   }
 




  public function guardarpagoefectivochofer(Request $request){
$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $Movimiento=new MovimientoOPC(request()->except('_token'));
    $Movimiento->forma="EFECTIVO";
    $Movimiento->estado="ABIERTO";
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPC::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes


      $datosmovimientoscajas=new MovimientoCaja(request()->except('_token'));
      $consultamovimientos=MovimientoCaja::where('caja_id', $request->caja_id)->orderBy('id','DESC')->limit(1)->get();

      $importe_final_anterior=0;
      $datosmovimientoscajas->tipo_movimiento='EGRESO';
      $datosmovimientoscajas->descripcion='PAGO A CHOFER EN EFECTIVO';
      $datosmovimientoscajas->tipo='PAGO EFECTIVO'; 
      $datosmovimientoscajas->fecha=$date;
      $datosmovimientoscajas->caja_id=$request->caja_id;

      if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $datosmovimientoscajas->importe_final=$importe_final_anterior-$datosmovimientoscajas->importe;
      $datosmovimientoscajas->save();



      $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);


     $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
        });
      flash::success('Se registro el pago en efectivo al chofer'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
       

  }
  public function guardarpagoefectivoproveedor(Request $request){
  $date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $Movimiento=new MovimientoOPP(request()->except('_token'));
    $Movimiento->forma="EFECTIVO";
    $Movimiento->estado="ABIERTO";
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPP::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

    $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);

      
      $datosmovimientoscajas=new MovimientoCaja(request()->except('_token'));
      $consultamovimientos=MovimientoCaja::where('caja_id', $request->caja_id)->orderBy('id','DESC')->limit(1)->get();

      $importe_final_anterior=0;
      $datosmovimientoscajas->tipo_movimiento='EGRESO';
      $datosmovimientoscajas->descripcion='PAGO A PROVEEDOR EN EFECTIVO';
      $datosmovimientoscajas->tipo='PAGO EFECTIVO'; 
      $datosmovimientoscajas->fecha=$date;
      $datosmovimientoscajas->caja_id=$request->caja_id;

      if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $datosmovimientoscajas->importe_final=$importe_final_anterior-$datosmovimientoscajas->importe;
      $datosmovimientoscajas->save();






    $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->proveedor;
        });
      flash::success('Se registro el pago en efectivo al Proveedor'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
       

  }



    public function guardarpagotransferenciachofer(Request $request){

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'cuentabancariapropia_id'=>'required',
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/


    $consultactabancaria=CuentaBancariaPropia::where('id',$request->cuentabancariapropia_id)->limit(1)->get();

    $Movimiento=new MovimientoOPC(request()->except('_token'));
    $Movimiento->forma="TRANSFERENCIA";
    $Movimiento->estado="ABIERTO";
    $Movimiento->nroinstrumento=$consultactabancaria[0]->cbu;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPC::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

      $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);


     $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
        });
      flash::success('Se registro el pago con transferencia al chofer'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
       

  }
    public function guardarpagotransferenciaproveedor(Request $request){

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'cuentabancariapropia_id'=>'required',
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/


    $consultactabancaria=CuentaBancariaPropia::where('id',$request->cuentabancariapropia_id)->limit(1)->get();

    $Movimiento=new MovimientoOPP(request()->except('_token'));
    $Movimiento->forma="TRANSFERENCIA";
    $Movimiento->estado="ABIERTO";
    $Movimiento->nroinstrumento=$consultactabancaria[0]->cbu;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPP::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

      $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);


     $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->proveedor;
        });
      flash::success('Se registro el pago con transferencia al Proveedor'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
       

  }

 public function guardarpagochequepropiochofer(Request $request){
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chequepropio_id'=>'required',
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $consultachequepropio=ChequePropio::where('id',$request->chequepropio_id)->limit(1)->get();


    $Movimiento=new MovimientoOPC(request()->except('_token'));
    $Movimiento->forma="CHEQUE PROPIO";
    $Movimiento->estado="ABIERTO";
    $Movimiento->nroinstrumento=$consultachequepropio[0]->numero;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPC::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

    $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);



    $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();


    $actualizarchequepropio=ChequePropio::where('id',$request->chequepropio_id)
                ->update([
                        'estado'=>'ENTREGADO',
                        'importe'=>$request->importe,
                        'fecha'=>$request->fecha,
                        'chofer_id'=>$datosopchofer[0]->chofer_id
                     ]);


    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
        });
      flash::success('Se registro el pago con transferencia al chofer'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
  }
 public function guardarpagochequepropioproveedor(Request $request){
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chequepropio_id'=>'required',
            'importe'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $consultachequepropio=ChequePropio::where('id',$request->chequepropio_id)->limit(1)->get();


    $Movimiento=new MovimientoOPP(request()->except('_token'));
    $Movimiento->forma="CHEQUE PROPIO";
    $Movimiento->estado="ABIERTO";
    $Movimiento->nroinstrumento=$consultachequepropio[0]->numero;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPP::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

    $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);

    $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $actualizarchequepropio=ChequePropio::where('id',$request->chequepropio_id)
                ->update([
                        'estado'=>'ENTREGADO',
                        'importe'=>$request->importe,
                        'fecha'=>$request->fecha,
                          'proveedor_id'=>$datosopchofer[0]->proveedor_id
                     ]);

   
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });
      flash::success('Se registro el pago con transferencia al chofer'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
  }



 public function guardarpagochequetercerochofer(Request $request){

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chequetercero_id'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $consultachequetercero=ChequeTercero::where('id',$request->chequetercero_id)->limit(1)->get();


    $Movimiento=new MovimientoOPC(request()->except('_token'));
    $Movimiento->forma="CHEQUE TERCERO";
    $Movimiento->estado="ABIERTO";
        $Movimiento->importe=$consultachequetercero[0]->importe;
    $Movimiento->nroinstrumento=$consultachequetercero[0]->numero;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPC::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

    $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);


    $actualizarchequetercero=ChequeTercero::where('id',$request->chequetercero_id)
                ->update([
                        'estado'=>'ENTREGADO',


                     ]);

    $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $actualizarchequetercero=ChequeTercero::where('id',$request->chequetercero_id)
                ->update([
                        'estado'=>'ENTREGADO',
                        'chofer_id'=>$datosopchofer[0]->chofer_id
                     ]);

    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
        });
      flash::success('Se registro el pago con transferencia al chofer'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
  }
 
 public function guardarpagochequeterceroproveedor(Request $request){

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chequetercero_id'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $consultachequetercero=ChequeTercero::where('id',$request->chequetercero_id)->limit(1)->get();


    $Movimiento=new MovimientoOPP(request()->except('_token'));
    $Movimiento->forma="CHEQUE TERCERO";
    $Movimiento->estado="ABIERTO";
    $Movimiento->importe=$consultachequetercero[0]->importe;
    $Movimiento->nroinstrumento=$consultachequetercero[0]->numero;
    $Movimiento->fecha=new \DateTime();
    $Movimiento->save();



    $consultasuma=MovimientoOPP::where('ordendepago_id',$request->ordendepago_id)->sum('importe');//suma de importes en el moviemitnos de ops de choferes

    $actualizarop=OrdenPago::where('id',$request->ordendepago_id)
                ->update([
                'montoacumulado'=>$consultasuma
                     ]);

    $datosopchofer=OrdenPago::where('id',$request->ordendepago_id)->get();
    $actualizarchequetercero=ChequeTercero::where('id',$request->chequetercero_id)
                ->update([
                        'estado'=>'ENTREGADO',
                        'proveedor_id'=>$datosopchofer[0]->proveedor_id
                     ]);



    $datosopchofer->each(function($datosopchofer){
           $datosopchofer->proveedor;
        });
      flash::success('Se registro el pago con cheque tercero al Proveedor'); 


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
  }




    public function opchoferes(){
  
    $choferes=Chofer::orderBy('nombre','ASC')->pluck('nombre','id');
      return view('pagos.opchoferes')
            ->with('choferes',$choferes);
   }

   public function opproveedores(){


  
    $proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
    return view('pagos.opproveedores')
            ->with('proveedores',$proveedores);
   }

    public function ordenesdepagos(){
  
    $datosopchofer=OrdenPago::orderBy('id','DESC')->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });


    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
   }

public function generaropproveedor(Request $request){

    $date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $nop=OrdenPago::orderBy('id','DESC')->limit(1)->get();

    $datosop=new OrdenPago(request()->except('_token'));
    $datosop->fecha=$date;
    $datosop->tipo='P';
    $datosop->estado='ABIERTO';



    if(count($nop)>0){
        $datosop->numero=$nop[0]->numero+1;
      }
      else{
        $datosop->numero=100000;
      }

    $datosop->save();
    $datosopchofer=OrdenPago::orderBy('id','DESC')->limit(1)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });

    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
 }
public function generaropchofer(Request $request){

    $date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chofer_id'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

    $nop=OrdenPago::orderBy('id','DESC')->limit(1)->get();

    $datosop=new OrdenPago(request()->except('_token'));
    $datosop->fecha=$date;
    $datosop->tipo='C';
    $datosop->estado='ABIERTO';



    if(count($nop)>0){
        $datosop->numero=$nop[0]->numero+1;
      }
      else{
        $datosop->numero=100000;
      }

    $datosop->save();
    $datosopchofer=OrdenPago::orderBy('id','DESC')->limit(1)->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
        });

    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
 }



 
   public function guardarpagoefectivo(Request $request){
		 $date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required',
            'importe'=>'required',
            'fecha'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

		$proveedor=Proveedor::where('id',$request->proveedor_id)->get();

		foreach ($proveedor as $proveedores) {
          $saldoanterior=$proveedores;
        }

        $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
                ->update([
                          'saldo'=>$saldoanterior->saldo-$request->importe
                        ]);

      $caja='2';
      $datosmovimientoscajas=new MovimientoCaja(request()->except('_token'));
      $consultamovimientos=MovimientoCaja::where('caja_id', $caja)->orderBy('id','DESC')->limit(1)->get();



      $importe_final_anterior=0;
      $datosmovimientoscajas->tipo_movimiento='EGRESO';
      $datosmovimientoscajas->descripcion='PAGO A PROVEEDOR EN EFECTIVO';
      $datosmovimientoscajas->tipo='PAGO EFECTIVO'; 
      $datosmovimientoscajas->fecha=$date;
      $datosmovimientoscajas->caja_id=$caja;

      if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $datosmovimientoscajas->importe_final=$importe_final_anterior-$datosmovimientoscajas->importe;
      $datosmovimientoscajas->save();
///// falta hacer el movimiento de los pagos!!!! de cada pagina 
   }


   public function cheque(){
		$estado='DISPONIBLE';
		$proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
		$chequestercero=ChequeTercero::where('estado', $estado)->orderBy('importe','ASC')->pluck('importe','id');
    $chequespropio=ChequePropio::where('estado', $estado)->orderBy('numero','ASC')->pluck('numero','id');


    	return view('pagos.cheque')
    			 ->with('chequestercero',$chequestercero)
           ->with('chequespropio',$chequespropio)
        	 ->with('proveedores',$proveedores);
   }
 public function guardarpagocheque(Request $request){
 		$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required',
         //   'chequepropio_id'=>'required',
          //  'chequetercero_id'=>'required',
            'fecha'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/
      

         if((empty($request->chequetercero_id)) and (empty($request->chequetercero_id)) )
         {
              flash::warning('Debe ingresar al menos un tipo de cheque');
          } 
        else{ 
                   //   dd('selecciono');
        ///// actualizar el pago de cheques terceros
            if(!empty($request->chequetercero_id)){
		          $proveedor=Proveedor::where('id',$request->proveedor_id)->get();
		          foreach ($proveedor as $proveedores) {
                $saldoanterior=$proveedores;
              }

              $cheque=ChequeTercero::where('id',$request->chequetercero_id)->get();
		          foreach ($cheque as $cheques) {
                $cheque=$cheques;
              }

              $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
                ->update([
                'saldo'=>$saldoanterior->saldo-$cheque->importe
                     ]);
              $actualizarcheque=ChequeTercero::where('id',$request->chequetercero_id)
                ->update([
		            'estado'=>'ENTREGADO',
		            'proveedor_id'=>$request->proveedor_id,
		            'fecha'=>$request->fecha
                     ]);
                flash::success('Se ingreso pago con cheque de tercero');  
            }
    ///////////////////////////////// fin de pago de cheques terceros

        ///// actualizar el pago de cheques propios
             if(!empty($request->chequepropio_id)){
                $proveedor=Proveedor::where('id',$request->proveedor_id)->get();
                foreach ($proveedor as $proveedores) {
                $saldoanterior=$proveedores;
                }

                $cheque=ChequePropio::where('id',$request->chequepropio_id)->get();
                foreach ($cheque as $cheques) {
                  $chequepropio=$cheques;
                }

                $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
                  ->update([
                  'saldo'=>$saldoanterior->saldo-$request->importe
                       ]);

                $actualizarcheque=ChequePropio::where('id',$request->chequepropio_id)
                  ->update([
                  'estado'=>'ENTREGADO',
                  'proveedor_id'=>$request->proveedor_id,
                  'importe'=>$request->importe,
                  'fecha'=>$request->fecha
                      ]);
                flash::success('Se ingreso pago con cheque propio');  
              }
    ///////////////////////////////// fin de pago de cheques propios
         }
            return Redirect('pagos/cheque/');

            ///// falta hacer el movimiento de los pagos!!!! de cada pagina 
 }

 public function chequepropio(){
		$estado='DISPONIBLE';
		$proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
		$cheques=ChequePropio::where('estado', $estado)->orderBy('numero','ASC')->pluck('numero','id');

    	return view('pagos.chequepropio')
    			->with('cheques',$cheques)
        		->with('proveedores',$proveedores);
   }
public function guardarpagochequepropio(Request $request){
 		$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required',
            'cheque_id'=>'required',
            'importe'=>'required',
            'fecha'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

		$proveedor=Proveedor::where('id',$request->proveedor_id)->get();
		foreach ($proveedor as $proveedores) {
          $saldoanterior=$proveedores;
        }

        $cheque=ChequePropio::where('id',$request->cheque_id)->get();
		foreach ($cheque as $cheques) {
          $chequepropio=$cheques;
        }

        $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
            ->update([
            		'saldo'=>$saldoanterior->saldo-$request->importe
                     ]);

        $actualizarcheque=ChequePropio::where('id',$request->cheque_id)
     		     ->update([
					        'estado'=>'ENTREGADO',
		    				'proveedor_id'=>$request->proveedor_id,
		    				'importe'=>$request->importe,
		    				'fecha'=>$request->fecha
                    ]);
            ///// falta hacer el movimiento de los pagos!!!! de cada pagina 
 }
 public function transferencia(){

		$proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
		$cuentasbancariaspropias=CuentaBancariaPropia::orderBy('cbu','ASC')->pluck('cbu','id');

    	return view('pagos.transferencia')
    			->with('cuentasbancariaspropias',$cuentasbancariaspropias)
        		->with('proveedores',$proveedores);
   }

 public function guardarpagotransferencia(Request $request){
 		$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required',
            'cuentabancariapropia_id'=>'required',
            'importe'=>'required',
            'fecha'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

		$proveedor=Proveedor::where('id',$request->proveedor_id)->get();
		foreach ($proveedor as $proveedores) {
          $saldoanterior=$proveedores;
        }

        $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
            ->update([
            		'saldo'=>$saldoanterior->saldo-$request->importe
                     ]);
            ///// falta hacer el movimiento de los pagos!!!! de cada pagina 
 }
 public function prestamo(){

		$choferes=Chofer::orderBy('nombre','ASC')->pluck('nombre','id');
    $cajas=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
		//$cuentasbancariaspropias=CuentaBancariaPropia::orderBy('cbu','ASC')->pluck('cbu','id');
    	return view('pagos.prestamo')
          		->with('choferes',$choferes)
              ->with('cajas',$cajas);
   }

public function guardarprestamo(Request $request){
		 $date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chofer_id'=>'required',
            'importe'=>'required',
            'descripcion'=>'required',
            'modoprestamo'=>'required',
            'cantcuotas'=>'required',
            'fechainicio'=>'required',

         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/
        
	    $datosprestamo=new PrestamoChofer(request()->except('_token'));
      $datosprestamo->importerestante=$request->importe;
      $datosprestamo->cantcuotasfaltantes=$request->cantcuotas;
      $datosprestamo->valorcuota=$request->importe/$request->cantcuotas;

      $fecha = Carbon::parse($request->fechainicio);
      $mfecha = $fecha->month;
      $datosprestamo->fechaproximopago=$mfecha;
      $datosprestamo->fecha=$date;
      $estado='INICIADO';
      $datosprestamo->estado=$estado;
      $datosprestamo->save();



          $datosmovimientoscajas=new MovimientoCaja(request()->except('_token'));
          $consultamovimientos=MovimientoCaja::where('caja_id', $request->caja_id)->orderBy('id','DESC')->limit(1)->get();

          $importe_final_anterior=0;
          $datosmovimientoscajas->tipo_movimiento='EGRESO';
          $datosmovimientoscajas->descripcion='PRESTAMO A CHOFER EN EFECTIVO';
          $datosmovimientoscajas->tipo='PRESTAMO EFECTIVO'; 
          $datosmovimientoscajas->fecha=$date;
          $datosmovimientoscajas->caja_id=$request->caja_id;

          if($consultamovimientos <> null){
            foreach ($consultamovimientos as $consultamovimiento) {
               $importe_final_anterior=$consultamovimiento->importe_final;
             }
          }  
          $datosmovimientoscajas->importe_final=$importe_final_anterior-$datosmovimientoscajas->importe;
      if( $request->modoprestamo =='efectivo' and $request->caja_id <> null){
          $datosmovimientoscajas->save();
          flash::success('Se actualizo la caja'); 
      }

          ///// falta hacer el movimiento de los pagos!!!! de cada pagina 
      $consultaprestamo=PrestamoChofer::orderBy('id','DESC')->limit(1)->get();
      
      $contador=1;
      while ($contador <= $request->cantcuotas){
        $movimientoprestamochofer=new MovimientoPrestamoChofer();
        $movimientoprestamochofer->cuota=$contador;
        $movimientoprestamochofer->importe=$datosprestamo->valorcuota;
        $movimientoprestamochofer->estado='DEBE';
        $movimientoprestamochofer->prestamoschoferes_id=$consultaprestamo[0]->id;
        $movimientoprestamochofer->save();
        $contador++;
      }
      flash::success('Se registro el prestamos del chofer'); 
      return Redirect('pagos/listarprestamo/');
 }

  public function listarprestamo(){

        //$datos['acoplados']=Acoplado::paginate(10);
        $prestamos=PrestamoChofer::orderBy('id','desc')->paginate(10);

        //esto es para las relacion de la tabla acoplados con camion
        $prestamos->each(function($prestamos){
          $prestamos->chofer;
        });
    //----------------------------------------------------------
          return view('pagos.listarprestamo')
          ->with('prestamos',$prestamos);
   }

   /*---------------------------------------------------------------*/
 public function saldarcuota($id){
        $date = new \DateTime();
        $consultaprestamochofer=PrestamoChofer::find($id);
        $consultachofer=Chofer::find($consultaprestamochofer->chofer_id);

        
        $saldofinalchofer=$consultachofer->saldo-$consultaprestamochofer->valorcuota;
        $actualizarsaldochofer=Chofer::where('id',$consultaprestamochofer->chofer_id)
              ->update([
                   'saldo'=>$saldofinalchofer
                       ]);

        $importerestante=$consultaprestamochofer->importerestante-$consultaprestamochofer->valorcuota;
        $cantcuotasfaltantes=$consultaprestamochofer->cantcuotasfaltantes-1;

        if($cantcuotasfaltantes==0){
          $estado='SALDADO';
        }
        else{
          $estado='INICIADO'; 
        }


        if($consultaprestamochofer->fechaproximopago == 12){
          $fechaproximopago=1;
        }
        else{
          $fechaproximopago=$consultaprestamochofer->fechaproximopago+1;
        }


        $actualizarprestamo=PrestamoChofer::where('id',$id)
              ->update([
                   'importerestante'=>$importerestante,
                   'estado'=>$estado,
                   'fechaproximopago'=>$fechaproximopago,
                   'cantcuotasfaltantes'=>$cantcuotasfaltantes
                       ]);


        $consultamovimientos=MovimientoPrestamoChofer::where('prestamoschoferes_id', $id)->where('estado','DEBE  ')->orderBy('id','ASC')->limit(1)->get();


        $actualizarmovimientoprestamo=MovimientoPrestamoChofer::where('id',$consultamovimientos[0]->id)
               ->update([
                    'estado'=>'PAGADO',
                    'fechadescuento'=>$date
                        ]);




        $prestamos=PrestamoChofer::orderBy('id','desc')->paginate(10);

        //esto es para las relacion de la tabla acoplados con camion
        $prestamos->each(function($prestamos){
          $prestamos->chofer;
        });
        flash::success('Se registro el pago de la cuota del chofer '.$consultachofer->nombre );
        flash::success('Se actualizo al cuenta corriente de '.$consultachofer->nombre );  
        return view('pagos.listarprestamo')
          ->with('prestamos',$prestamos);
  }

    public function anticipo(){
      $choferes=Chofer::orderBy('nombre','ASC')->pluck('nombre','id');
      $cajas=Caja::orderBy('denominacion','ASC')->pluck('denominacion','id');
      
      return view('pagos.anticipo')
        ->with('choferes',$choferes)
        ->with('cajas',$cajas);
   }

    public function guardaranticipo(Request $request){


    $datosAnticipo=new Anticipo(request()->except('_token'));
    $datosAnticipo->estado='ABIERTO';
    // GUARDAR ANTICIPO ----------------------------------------------

    $nremitoanticipo=Anticipo::orderBy('id','DESC')->limit(1)->get();



      if(count($nremitoanticipo)>0){
          $datosAnticipo->nroremito=$nremitoanticipo[0]->nroremito+1;
        }
        else{
          $datosAnticipo->nroremito='300000';
        }
      $datosAnticipo->save();

    // FIN DE GUARDAR ANTICIPO--------------------------------------

  // GUARDAR MOVIMIENTO DE CAJA ----------------------------------------------

    $anticipoimporte=Anticipo::orderBy('id','DESC')->limit(1)->get();

    $movimientocaja=new MovimientoCaja();
    $movimientocaja->tipo='ANTICIPO';
    $movimientocaja->tipo_movimiento='EGRESO';
    $movimientocaja->descripcion='ANTICIPO A CHOFER.';
    $movimientocaja->fecha=$request->fecha;
    $movimientocaja->importe=$anticipoimporte[0]->importe;
    $movimientocaja->caja_id=$request->caja_id;

    $consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
    $importe_final_anterior=0;
        if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $movimientocaja->importe_final=$importe_final_anterior-$anticipoimporte[0]->importe;
      $movimientocaja->save();
    
    $consultachofer=Chofer::where('id',$request->chofer_id)->get();
    $saldofinal=$consultachofer[0]->saldo-$request->importe;

    $actualizarproveedor=Chofer::where('id',$request->chofer_id)
               ->update([
                    'saldo'=>$saldofinal
                  
                        ]);

        flash::success('Se INGRESO un nuevo anticipo y se actualizo la cuenta del Chofer');
        flash::success('Se actualizo la CAJA ');
        return Redirect('pagos/anticipo/');
      }

    public function listarPdfOPProveedor($id){

      $datomovop=MovimientoOPP::where('ordendepago_id',$id)->get();


      $datosopproveedor=OrdenPago::where('id',$id)->get();
      $datosopproveedor->each(function($datosopproveedor){
          $datosopproveedor->chofer;
          $datosopproveedor->proveedor;
        });


$formatter = new NumeroALetras();
 $montoenletras=$formatter->toMoney($datosopproveedor[0]->montofinal, 2, 'PESOS','CENTAVOS');
 
  


      $pdf=\PDF::loadView('pdf.reporteoppdf',['datomovop'=>$datomovop,'datosopproveedor'=>$datosopproveedor,'montoenletras'=>$montoenletras])
        ->setPaper('a4','landscape');
        return $pdf->download('flete.pdf');
        
    }

public function cerrarop($id){


    $date = new \DateTime();
    $datosopchofer=OrdenPago::where('id',$id)->get();

    if($datosopchofer[0]->estado=='CERRADO')
    {
        flash('LA OP YA FUE CERRADA')->warning();
            return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
    }
    else
    {
    try{//esto es para que si hay un error en un insert en una table no grabe en la otra
        DB::beginTransaction(); 
    $actualizarop=OrdenPago::where('id',$id) 
                ->update([
                'montofinal'=>$datosopchofer[0]->montoacumulado,
                'estado'=>'CERRADO'
                     ]);

    $datosproveedor=Proveedor::where('id',$datosopchofer[0]->proveedor_id)->get();
    $saldofinal=$datosproveedor[0]->saldo-$datosopchofer[0]->montoacumulado;
    $actualizarproveedor=Proveedor::where('id',$datosopchofer[0]->proveedor_id)
                ->update([
                'saldo'=>$saldofinal
                     ]);

    $datosopchofer=OrdenPago::orderBy('id','DESC')->get();
    $datosopchofer->each(function($datosopchofer){
          $datosopchofer->chofer;
          $datosopchofer->proveedor;
        });


    $datoacumulado=CtaCteP::where('proveedor_id',$datosopchofer[0]->proveedor_id)->orderBy('id','DESC')->limit(1)->get();

    

    $acumulado=Proveedor::where('id',$id)->orderBy('id','DESC')->limit(1)->get();
    $datosComprobante=new CtaCteP();
    $datosComprobante->proveedor_id=$datosopchofer[0]->proveedor_id;
    $datosComprobante->tipocomprobante='ORDEN DE PAGO';
    $datosComprobante->nrocomprobante=$datosopchofer[0]->numero;
    $datosComprobante->fechaemision=$date;
    $datosComprobante->fechavencimiento=$date;
    $datosComprobante->debe=0;
    $datosComprobante->haber=$datosopchofer[0]->montoacumulado;
    $datosComprobante->acumulado=$saldofinal;
    //$datosComprobante->acumulado=$datoacumulado[0]->acumulado - $datosopchofer[0]->montoacumulado;
    $datosComprobante->save();

    DB::commit();
            flash::success('Se cerro la OP del Proveedor');
             return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);

    } catch(\Exception $e){
            DB::rollBack();
            return redirect ("/pagos/ordenesdepagos")->with('status','2');
    }

   // flash::success('Se cerro la OP del Proveedor'); 
    ///return view('pagos.imputarchofer')
      //      ->with('datosopchofer',$datosopchofer);
 
    } 

  }
public function cerraropchofer($id){

     $datosopchofer=OrdenPago::where('id',$id)->get();
     $actualizarop=OrdenPago::where('id',$id)
                ->update([
                'montofinal'=>$datosopchofer[0]->montoacumulado,
                'estado'=>'CERRADO'
                     ]);

    $datoschofer=Chofer::where('id',$datosopchofer[0]->chofer_id)->get();
    $saldofinal=$datoschofer[0]->saldo-$datosopchofer[0]->montoacumulado;
    $actualizarchofer=Chofer::where('id',$datosopchofer[0]->chofer_id)
                ->update([
                'saldo'=>$saldofinal

                     ]);


      flash::success('Se cerro la OP del Chofer'); 
    return view('pagos.imputarchofer')
            ->with('datosopchofer',$datosopchofer);
       

  }



 
}
