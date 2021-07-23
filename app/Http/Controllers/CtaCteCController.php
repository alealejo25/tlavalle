<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\CtaCteC;
use App\Provincia;
use App\OrdenPagoC;

use Laracasts\Flash\Flash;

class CtaCteCController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        
        $clientes=Cliente::search($request->name)->orderBy('nombre','ASC')->paginate(20);
        return view('cuentascorrientes.clientes.index')
            ->with('clientes',$clientes);

    }
	public function nuevocomprobante($id){

		
		$clientes=Cliente::where('id',$id)->get();

		// $vales=Vale::where('flete_id',$id)->get();
		$cuentacorrientecliente=CtaCteC::where('cliente_id',$id)->where('tipocomprobante','FACTURA')->pluck('nrocomprobante','id');
		return view('cuentascorrientes.clientes.nuevocomprobante')
		 	->with('cuentacorrientecliente',$cuentacorrientecliente)
		 	->with('clientes',$clientes)
  			->with('id',$id);
 

    }

    public function nuevaop($id){

        
        $clientes=Cliente::where('id',$id)->get();
       $provincias=Provincia::orderBy('nombre','ASC')->pluck('nombre','nombre');
        return view('cuentascorrientes.clientes.nuevaop')
            ->with('provincias',$provincias)
            ->with('clientes',$clientes)
            ->with('id',$id);


    }


    public function guardaropc(Request $request,$id)
    {
        $datosComprobante=new OrdenPagoC(request()->except('_token'));
        $datosComprobante->cliente_id=$id;
        $datosComprobante->save();
        flash::success('Comprobante ingresado!!! - Tipo Orden de Pago Cliente - Nro ' .$request->nrocomprobante);
       return Redirect('cuentascorrientes/clientes/')->with('Mensaje','Comprobante ingresado!!!');
    }
    public function guardarcomprobantec(Request $request,$id)
    {

    	$acumulado=Cliente::where('id',$id)->orderBy('id','DESC')->limit(1)->get();
        $datosComprobante=new CtaCteC(request()->except('_token'));


        $datosComprobante->cliente_id=$id;

        switch ($request->tipocomprobante){
        	case 'FACTURA':
        		$datosComprobante->debe=0;
        		$datosComprobante->haber=$request->importe;
        		$datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
                $datosComprobante->importesubtotal=$request->importesubtotal;
                $datosComprobante->iva=$request->iva;
                $datosComprobante->exento=$request->exento;
                $datosComprobante->importefinal=$request->importefinal;
                $datosComprobante->factura_id=null;
        		$datosComprobante->save();
        		$editarcliente=Cliente::where('id',$id)
                ->update([
                		'saldo'=>$datosComprobante->acumulado
                          ]);
        	break;


        	case 'NOTA DE DEBITO':
        		$datosComprobante->debe=0;
        		$datosComprobante->haber=$request->importe;
        		$datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
        		$datosComprobante->save();
				$editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);

        	break;
        	case 'ORDEN DE PAGO':
        		$datosComprobante->debe=$request->importe;
        		$datosComprobante->haber=0;
        		$datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
        		$datosComprobante->save();
				$editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
        	break;

            case 'NOTA DE CREDITO':
                $datosComprobante->debe=$request->importe;
                $datosComprobante->haber=0;
                $datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
                $datosComprobante->save();
                $editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
            break;
            case 'DESCUENTOS':
                $datosComprobante->debe=$request->importe;
                $datosComprobante->haber=0;
                $datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
                $datosComprobante->save();
                $editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
            break;

        	case 'REMITO':
        		$datosComprobante->debe=0;
        		$datosComprobante->haber=$request->importe;
        		$datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
        		$datosComprobante->save();
				$editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);



        	break;
        	case 'RECIBO':
        		$datosComprobante->debe=$request->importe;
        		$datosComprobante->haber=0;
        		$datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
        		$datosComprobante->save();
				$editarcliente=Cliente::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
        	break;
        }
   		flash::success('Comprobante ingresado!!! - Tipo '.$request->tipocomprobante. '-' .$request->nrocomprobante);
       return Redirect('cuentascorrientes/clientes/')->with('Mensaje','Comprobante ingresado!!!');

    }
	public function listarcomprobantes($id)
    {
    	$cuentacorrientecliente=CtaCteC::where('cliente_id',$id)->orderBy('id','DESC')->paginate(30);
    	$cliente=Cliente::where('id',$id)->get();


    	$cuentacorrientecliente->each(function($cuentacorrientecliente){
            $cuentacorrientecliente->ctactec;

        });


    	return view('cuentascorrientes.clientes.listarcomprobantes')
		 	->with('cuentacorrientecliente',$cuentacorrientecliente)
		 	->with('cliente',$cliente);
   }
    public function asociarcomprobantec($id)
   {
        $cuentacorrientecliente=CtaCteC::where('cliente_id',$id)->where('tipocomprobante','REMITO')->where('estado',null)->orderBy('fechavencimiento','DESC')->get();

        $cliente=Cliente::where('id',$id)->get();


        $cuentacorrientecliente->each(function($cuentacorrientecliente){
            $cuentacorrientecliente->ctactec;

        });


        return view('cuentascorrientes.clientes.asociarcomprobantes')
            ->with('cuentacorrientecliente',$cuentacorrientecliente)
            ->with('cliente',$cliente)
                        ->with('id',$id);
   }

public function editarcomprobantec($id)
    {

        $comprobante=CtaCteC::find($id);
        return view('cuentascorrientes.clientes.editarcomprobante')
            ->with('comprobante',$comprobante);
    }
public function guardaredicioncomprobante(Request $request,$id)
    {

    $datosComprobante=request()->except(['_token','_method']);
    CtaCteC::where('id','=',$id)->update($datosComprobante);
    $cliente=CtaCteC::where('id',$id)->get();


    flash::success('Se modifico correctamente el comprobante Nro: ' .$request->nrocomprobante);
        return Redirect('cuentascorrientes/clientes/'.$cliente[0]->cliente_id.'/listar')->with('Mensaje','Comprobante ingresado!!!');
    }

   public function guardarfacturac(Request $request,$id)
   {
        $acumulado=Cliente::where('id',$id)->orderBy('id','DESC')->limit(1)->get();
        $datosComprobante=new CtaCteC(request()->except('_token'));

        $datosComprobante->tipocomprobante='FACTURA';
        $datosComprobante->cliente_id=$id;
        $datosComprobante->debe=0;
        $datosComprobante->haber=$request->importe;
        $datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
        $datosComprobante->factura_id=null;

        
        $datosComprobante->save();

        $editarcliente=Cliente::where('id',$id)
                    ->update([
                           'saldo'=>$datosComprobante->acumulado
                              ]);

        $acumulado=CtaCteC::orderBy('id','DESC')->limit(1)->get();

        $cantidad=count($request->rem);

        for($i=0;$i<$cantidad;$i++){

            $editarcliente=CtaCteC::where('cliente_id',$id)->where('id',$request->rem[$i])
                ->update([
                            'factura_id'=>$acumulado[0]->id,
                            'estado'=>'ASOCIADO'
                        ]);
        }

        flash::success('Remitos Asociados Correctamente, a la Factura Nro. ' .$request->nrocomprobante);
        return Redirect('cuentascorrientes/clientes/')->with('Mensaje','Comprobante ingresado!!!');
   }
}
