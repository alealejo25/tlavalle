<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chofer;
use App\CtaCteCho;

use Laracasts\Flash\Flash;

class CtaCteChoController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        
        $choferes=Chofer::orderBy('nombre','ASC')->paginate(20);
        return view('cuentascorrientes.choferes.index')
            ->with('choferes',$choferes);

    }
     public function nuevocomprobante($id){
		$choferes=Chofer::where('id',$id)->get();

		// $vales=Vale::where('flete_id',$id)->get();
		$cuentacorrientechofer=CtaCteCho::where('chofer_id',$id)->where('tipocomprobante','FACTURA')->pluck('nrocomprobante','id');
		return view('cuentascorrientes.choferes.nuevocomprobante')
		 	->with('cuentacorrientechofer',$cuentacorrientechofer)
		 	->with('choferes',$choferes)
  			->with('id',$id);


    }



    public function guardarcomprobantecho(Request $request,$id)
    {

      $acumulado=Chofer::where('id',$id)->orderBy('id','DESC')->limit(1)->get();

        $datosComprobante=new CtaCteCho(request()->except('_token'));
        $datosComprobante->chofer_id=$id;

        switch ($request->tipocomprobante){
          case 'FACTURA':
            $datosComprobante->debe=$request->importe;
            $datosComprobante->haber=0;
            $datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
                $datosComprobante->importesubtotal=$request->importesubtotal;
                $datosComprobante->iva=$request->iva;
                $datosComprobante->percepcioniva=$request->percepcioniva;
                $datosComprobante->ingresobruto=$request->ingresobruto;
                $datosComprobante->tem=$request->tem;
                $datosComprobante->ganancia=$request->ganancia;
                $datosComprobante->importefinal=$request->importefinal;

            $datosComprobante->factura_id=null;
            $datosComprobante->save();
            $editarcliente=Chofer::where('id',$id)
                ->update([
                    'saldo'=>$datosComprobante->acumulado
                          ]);
          break;

          
          case 'NOTA DE DEBITO':
            $datosComprobante->debe=$request->importe;
            $datosComprobante->haber=0;
            $datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
            $datosComprobante->save();
            $editarcliente=Chofer::where('id',$id)
                ->update([
                    'saldo'=>$datosComprobante->acumulado
                          ]);

          break;
          case 'NOTA DE CREDITO':
            $datosComprobante->debe=0;
            $datosComprobante->haber=$request->importe;
            $datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
            $datosComprobante->save();
        $editarcliente=Chofer::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
          break;
          case 'REMITO':
            $datosComprobante->debe=$request->importe;
            $datosComprobante->haber=0;
            $datosComprobante->acumulado=$acumulado[0]->saldo + $request->importe;
            $datosComprobante->save();
            $editarcliente=Chofer::where('id',$id)
                ->update([
                    'saldo'=>$datosComprobante->acumulado
                          ]);



          break;
          case 'RECIBO':
            $datosComprobante->debe=0;
            $datosComprobante->haber=$request->importe;
            $datosComprobante->acumulado=$acumulado[0]->saldo - $request->importe;
            $datosComprobante->save();
        $editarcliente=Chofer::where('id',$id)
                ->update([
                          'saldo'=>$datosComprobante->acumulado
                          ]);
          break;
        }
      flash::success('Comprobante ingresado!!! - Tipo '.$request->tipocomprobante. '-' .$request->nrocomprobante);
       return Redirect('cuentascorrientes/choferes/')->with('Mensaje','Comprobante ingresado!!!');

    }
    public function listarcomprobantes($id)
    {
      $cuentacorrientechofer=CtaCteCho::where('chofer_id',$id)->orderBy('id','DESC')->paginate(10);
      $chofer=Chofer::where('id',$id)->get();


      $cuentacorrientechofer->each(function($cuentacorrientechofer){
            $cuentacorrientechofer->ctactecho;

        });


      return view('cuentascorrientes.choferes.listarcomprobantes')
      ->with('cuentacorrientechofer',$cuentacorrientechofer)
      ->with('chofer',$chofer);
   }
}
