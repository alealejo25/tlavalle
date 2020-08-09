<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\MovimientoCaja;
use App\ChequeTercero;
use App\ChequePropio;
use App\CuentaBancariaPropia;

class PagoController extends Controller
{
   public function pagoefectivo(){
	
		$proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
    	return view('pagos.pagoefectivo')
        		->with('proveedores',$proveedores);
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
		$cheques=ChequeTercero::where('estado', $estado)->orderBy('importe','ASC')->pluck('importe','id');


    	return view('pagos.cheque')
    			->with('cheques',$cheques)
        		->with('proveedores',$proveedores);
   }
 public function guardarpagocheque(Request $request){
 		$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'proveedor_id'=>'required',
            'cheque_id'=>'required',
            'fecha'=>'required'
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

		$proveedor=Proveedor::where('id',$request->proveedor_id)->get();
		foreach ($proveedor as $proveedores) {
          $saldoanterior=$proveedores;
        }
        $cheque=ChequeTercero::where('id',$request->cheque_id)->get();
		foreach ($cheque as $cheques) {
          $chequetercero=$cheques;
        }

        $actualizarproveedor=Proveedor::where('id',$request->proveedor_id)
            ->update([
            'saldo'=>$saldoanterior->saldo-$chequetercero->importe
                     ]);

        $actualizarcheque=ChequeTercero::where('id',$request->cheque_id)
            ->update([
		            'estado'=>'ENTREGADO',
		            'proveedor_id'=>$request->proveedor_id,
		            'fecha'=>$request->fecha
                     ]);
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
 
}
