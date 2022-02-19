<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacion;
use App\Flete;
use App\Chofer;
use App\Tarifa;
use App\Anticipo;
use App\Vale;
use App\GastoVarioFlete;
use App\MovimientoCaja;
use App\Camion;
use App\Cliente;
use App\CtaCteC;
use App\CtaCteCho;
use App\RemitoFlete;


use Laracasts\Flash\Flash;
use Barryvdh\DomPDF\Facade as PDF;

use DB;

class FleteController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(Request $request)
    {
        $fletes=Flete::orderBy('id','DESC')->paginate(20);
        $fletes->each(function($fletes){
        	$fletes->camion;
        	
        });
        
        return view('fletes.index')
        ->with('fletes',$fletes);
    }

    public function create()
    {


        $choferes=Chofer::orderBy('nombre','ASC')->pluck('nombre','id');
        $tarifas=Tarifa::orderBy('descripcion','ASC')->pluck('descripcion','id');
        return view('fletes.create')
	        ->with('choferes',$choferes)
	        ->with('tarifas',$tarifas);
    }

     public function store(Request $request)
     {




 		$date = new \DateTime();
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'chofer_id'=>'required',
            'anticipos'=>'required|numeric'            
  
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/


   		$datosconsulta=DB::table('choferes')
	    	->join('camiones','camiones.id','=','choferes.camion_id')
	    	->where('choferes.id',$request->chofer_id)
	    	->get();

	    $nremito=Flete::orderBy('id','DESC')->limit(1)->get();

		$datosFlete=new Flete(request()->except('_token'));
		$datosFlete->camion_id=$datosconsulta[0]->camion_id;
		$datosFlete->kminicio=$datosconsulta[0]->km;
		$datosFlete->anticipos=$request->anticipos;
		$datosFlete->fechainicio=$date;
		$datosFlete->estado='INICIADO';


		if(count($nremito)>0){
	    	$datosFlete->nroremito=$nremito[0]->nroremito+1;
	    }
	    else{
	    	$datosFlete->nroremito=100000;
	    }

		 $datosFlete->save();

		// GUARDAR ANTICIPO ----------------------------------------------
	    $flete_id=Flete::orderBy('id','DESC')->limit(1)->get();

		$datosAnticipo=new Anticipo(request()->except('_token'));
		$datosAnticipo->fecha=$date;
		$datosAnticipo->importe=$request->anticipos;
		$datosAnticipo->flete_id=$flete_id[0]->id;
		$datosAnticipo->estado='PAGADO';
		$nremitoanticipo=Anticipo::orderBy('id','DESC')->limit(1)->get();

		if(count($nremitoanticipo)>0){

	    	$datosAnticipo->nroremito=$nremitoanticipo[0]->nroremito+1;
	    	$nroremitoanticipo=$nremitoanticipo[0]->nroremito+1;
	    }
	    else{
	    	$datosAnticipo->nroremito=300000;
	    	$nroremitoanticipo=300000;
	    }

		 $datosAnticipo->save();


		
		// GUARDAR MOVIMIENTO DE CAJA ----------------------------------------------

		$movimientocaja=new MovimientoCaja();
		$movimientocaja->tipo='ANTICIPO';
		$movimientocaja->tipo_movimiento='EGRESO';
		$movimientocaja->descripcion='ANTICIPO POR FLETE N° '.$datosFlete->nroremito.' - REMITO - '.$datosAnticipo->nroremito;
		$movimientocaja->fecha=$date;
		$movimientocaja->importe=$request->anticipos;
		$movimientocaja->caja_id='2';

		$consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
		$importe_final_anterior=0;
      	if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $movimientocaja->importe_final=$importe_final_anterior-$request->anticipos;
      $movimientocaja->save();
      

		$consultachofer=Chofer::where('id',$request->chofer_id)->get();
   		$saldofinal=$consultachofer[0]->saldo-$request->anticipos;
		$actualizarproveedor=Chofer::where('id',$request->chofer_id)
               			->update([
                  				'saldo'=>$saldofinal
                                 ]);

        $datosctactecho=new CtaCteCho();
     	$datosctactecho->tipocomprobante="ANTICIPO";
     	$datosctactecho->nrocomprobante=$nroremitoanticipo;
     	$datosctactecho->fechaemision=$date;
     	$datosctactecho->fechavencimiento=$date;
     	$datosctactecho->haber=$request->anticipos;
     	$datosctactecho->debe=0;
     	$datosctactecho->acumulado=$saldofinal;
		$datosctactecho->chofer_id=$request->chofer_id;
		$datosctactecho->observacion="Flete Nro. ".$datosFlete->nroremito;


 		$datosctactecho->save();

       flash::success('Se INICIO el flete con remito numero: F'.$datosFlete->nroremito); 
       //return Redirect('fletes/');



       return view('fletes.inicio')
        	->with('datoflete',$flete_id)
        	->with('datoanticipo',$datosAnticipo);

	
		// FIN DE GUARDAR MOVIMIENTO DE CAJA----------------
 	}



 	//// ANTICIPOS DE LOS FLETES
 	public function editaranticipos($id)
    {

    	$datosconsulta=DB::table('anticipos')
	    	->join('fletes','fletes.id','=','anticipos.flete_id')
	    	->select('anticipos.id as anticipo_id','anticipos.nroremito as nroremitoanticipo','importe','fletes.id')
	    	->where('anticipos.flete_id',$id)
	    	->get();


        return view('fletes.anticipos.editaranticipos')
        	->with('id',$id)
        	 ->with('datosconsulta',$datosconsulta);

    }


    public function eliminaranticipo($id)
    {


        $date = new \DateTime();

		// GUARDAR MOVIMIENTO DE CAJA ----------------------------------------------

 		$anticipoimporte=Anticipo::where('id',$id)->get();



		$movimientocaja=new MovimientoCaja();
		$movimientocaja->tipo='ELIMINACION DE ANTICIPO';
		$movimientocaja->tipo_movimiento='INGRESO';
		$movimientocaja->descripcion='ELIMINACION DE ANTICIPO';
		$movimientocaja->fecha=$date;
		$movimientocaja->importe=$anticipoimporte[0]->importe;
		$movimientocaja->caja_id='2';

		$consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
		$importe_final_anterior=0;
      	if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        	}
      	}  
     	 $movimientocaja->importe_final=$importe_final_anterior+$anticipoimporte[0]->importe;
      	$movimientocaja->save();

       	Anticipo::destroy($id);
        flash::success('Se ELIMINO correctamente el anticipo');
        flash::success('Se actualizo la CAJA PRINCIPAL');
        return Redirect('fletes');

    }


    public function nuevoanticipo($id){

	   	$datosconsulta=Anticipo::where('flete_id',$id)->get();
	   	$chofer_id=$datosconsulta[0]->chofer_id;


        return view('fletes.anticipos.nuevoanticipo')
        	->with('id',$id)
        	->with('chofer_id',$chofer_id)
        	->with('datosconsulta',$datosconsulta);

    }
    
    public function guardaranticipoflete(Request $request){

 /*VALIDACION -----------------------------------------*/
        $campos=[
            'fecha'=>'required',
            'importe'=>'required|numeric'            
  
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        $date = new \DateTime();
		$datosAnticipo=new Anticipo(request()->except('_token'));
		// GUARDAR ANTICIPO ----------------------------------------------


		$fletenro=Flete::where('id',$request->flete_id)->limit(1)->get();
		$nroflete= $fletenro[0]->nroremito;
		$nremitoanticipo=Anticipo::orderBy('id','DESC')->limit(1)->get();
			if(count($nremitoanticipo)>0){
		    	$datosAnticipo->nroremito=$nremitoanticipo[0]->nroremito+1;
		    }
		    else{
		    	$datosAnticipo->nroremito=300000;
		    }
		    $datosAnticipo->estado='PAGADO';
			$datosAnticipo->save();
		// FIN DE GUARDAR ANTICIPO--------------------------------------

	// GUARDAR MOVIMIENTO DE CAJA ----------------------------------------------

 		$anticipoimporte=Anticipo::orderBy('id','DESC')->limit(1)->get();

		$movimientocaja=new MovimientoCaja();
		$movimientocaja->tipo='ANTICIPO';
		$movimientocaja->tipo_movimiento='EGRESO';
		$movimientocaja->descripcion='ANTICIPO POR FLETE N° '.$nroflete;
		$movimientocaja->fecha=$date;
		$movimientocaja->importe=$anticipoimporte[0]->importe;
		$movimientocaja->caja_id=2;

		$consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
		$importe_final_anterior=0;
      	if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $movimientocaja->importe_final=$importe_final_anterior-$anticipoimporte[0]->importe;
      $movimientocaja->save();
    
		$consultaanticipoflete=Flete::where('id', $request->flete_id)->get();


		$actualizaranticipo=Flete::where('id',$request->flete_id)
               			->update([
                  				'anticipos'=>$consultaanticipoflete[0]->anticipos+$request->importe
                                 ]);

		$datochofer=Chofer::where('id',$request->chofer_id)->limit(1)->get();
		$saldofinal=$datochofer[0]->saldo-$request->importe;
		$editarchofer=Chofer::where('id',$request->chofer_id)
            ->update([
                      'saldo'=>$datochofer[0]->saldo-$request->importe
                     ]);


/*<<<<<<< HEAD*/
/*=======*/

/*>>>>>>> 689a339 (cta cte choferes)*/
	

	$datoacumulado=CtaCteCho::where('chofer_id',$request->chofer_id)->orderBy('id','DESC')->limit(1)->get();


    $acumulado=Chofer::where('id',$request->chofer_id)->orderBy('id','DESC')->limit(1)->get();
  

       $datosctactecho=new CtaCteCho();
     	$datosctactecho->tipocomprobante="ANTICIPO";
     	$datosctactecho->nrocomprobante=$datosAnticipo->nroremito;
     	$datosctactecho->fechaemision=$date;
     	$datosctactecho->fechavencimiento=$date;
     	$datosctactecho->haber=$request->importe;
     	$datosctactecho->debe=0;
     	$datosctactecho->acumulado=$saldofinal;
		$datosctactecho->chofer_id=$request->chofer_id;
		$datosctactecho->observacion="Flete Nro. ".$nroflete;

		$datosctactecho->save();









		flash::success('Se INGRESO un nuevo anticipo');
        flash::success('Se actualizo la CAJA PRINCIPAL');
        return Redirect('fletes');
      }



      // VALES VALES VALES

      //// VALES DE LOS FLETES
 	public function editarvales($id)
    {

    	$datosconsulta=DB::table('vales')
	    	->join('fletes','fletes.id','=','vales.flete_id')
	    	->select('vales.id as vale_id','vales.nroremitovale as nroremitovale','nroremitoestacion','cantidad','fletes.id')
	    	->where('vales.flete_id',$id)
	    	->get();

        return view('fletes.vales.editarvales')
        	->with('id',$id)
        	 ->with('datosconsulta',$datosconsulta);

    }

      //// VALES DE LOS FLETES
 	public function edicion($id)
    {

    	  $vale=Vale::find($id);
    	  $estaciones=Estacion::orderBy('id','DESC')->pluck('nombre','id');
        return view('fletes.vales.edicion')
            ->with('vale',$vale)
            ->with('estaciones',$estaciones);

    }
	public function guardaredicion(Request $request, $id)
    {
  		$datosvale=request()->except(['_token','_method']);
  		Vale::where('id','=',$id)->update($datosvale);
  		  flash::success('Vale Modificado con éxito!!!!!'); 
        return Redirect('fletes');
    }



 	public function eliminarvale($id)
    {
      	Vale::destroy($id);
        flash::success('Se ELIMINO correctamente el Vale');
        return Redirect('fletes');
    }

    public function nuevovale($id){

	   	$datosconsulta=Vale::where('flete_id',$id)->get();
		$estaciones=Estacion::orderBy('id','DESC')->pluck('nombre','id');

        return view('fletes.vales.nuevovale')
        	->with('id',$id)
        	->with('estaciones',$estaciones)
        	->with('datosconsulta',$datosconsulta);

    }


     public function guardarvale(Request $request){
        $date = new \DateTime();
		$datosVale=new Vale();

			$nremitovale=Vale::orderBy('id','DESC')->limit(1)->get();

			
			$datoestacion=Estacion::where('id',$request->estacion_id1)->get();

			if(count($nremitovale)>0){
		    	$datosVale->nroremitovale=$nremitovale[0]->nroremitovale+1;
		    }
		    else{
		    	$datosVale->nroremitovale=200000;
		    }
			$datosVale->estacion_id=$request->estacion_id;
			$datosVale->flete_id=$request->flete_id;
			$datosVale->fecha=$date;
			$datosVale->cantidad=$request->cantidad;
			$datosVale->nroremitoestacion=$request->nroremitoestacion;
			$datosVale->save();

 		flash::success('Se ingreso un nuevo VALE');
 
        return Redirect('fletes');
      }

    public function finalizarflete($id)
    {

		$flete=Flete::where('id',$id)->get();
		$anticipos=Anticipo::where('flete_id',$id)->get();
		$vales=Vale::where('flete_id',$id)->get();
		foreach($vales as $r){
			if($r->nroremitoestacion==NULL){
				 		flash::warning('Debe editar los vales que no tengas Numero de Remito de Estacion para finalizar el flete');
			return $this->editarvales($id);
			}

		}

		$clientes=Cliente::orderBy('id','DESC')->pluck('nombre','id');
		$clientesnombres=Cliente::orderBy('nombre', 'ASC')->get();
		$estaciones=Estacion::orderBy('id','DESC')->pluck('nombre','id');

		return view('fletes.finalizarflete')
		    ->with('id',$id)
			->with('flete',$flete)
			->with('anticipos',$anticipos)
			->with('clientes',$clientes)
			->with('clientesnombres',$clientesnombres)
			->with('estaciones',$estaciones)
			->with('vales',$vales);
		
    }


	//cancelacion de flete
 	public function cancelarflete($id) 
    {

		$date = new \DateTime();
    	$datoFlete=Flete::where('id',$id)->limit(1)->get();

 		$datochofer=Chofer::where('id',$datoFlete[0]->chofer_id)->limit(1)->get();

 		if($datoFlete[0]->estado=='FINALIZADO')
		{$editarchofer=Chofer::where('id',$datoFlete[0]->chofer_id)
            ->update([
                      //'saldo'=>$datochofer[0]->saldo+$datoFlete[0]->gastosvarios+$datoFlete[0]->montoaliquidar
                       'saldo'=>$datochofer[0]->saldo-$datoFlete[0]->montoaliquidar
                     ]);
        }
        else{
        	$editarchofer=Chofer::where('id',$datoFlete[0]->chofer_id)
            ->update([
                      //'saldo'=>$datochofer[0]->saldo+$datoFlete[0]->gastosvarios+$datoFlete[0]->montoaliquidar
                       'saldo'=>$datochofer[0]->saldo+$datoFlete[0]->anticipos-$datoFlete[0]->montoaliquidar
                     ]);
        }
    	// poner en cancelado el estado del flete
    	$editarflete=Flete::where('id',$id)
            ->update([
                      'estado'=>'CANCELADO',
                      'valorflete'=>0,
                      'combustiblegasto'=>0,
                      'combustibledestino'=>0,
                      'combustibletucuman'=>0,
                      'promedio'=>0,
                      'montoaliquidar'=>0,
                      'gastosvarios'=>0,
                      'anticipos'=>0,
                     ]);
		//----------------------------------------------

        $datochofer=Chofer::where('id',$datoFlete[0]->chofer_id)->limit(1)->get();


        //CANCELACION DE TODOS LOS ANTICIPOS Y DEVUELDE EL DINERO AL CHOFER
        $anticipos=Anticipo::where('flete_id',$id)->where('estado','PAGADO')->get();
		foreach ($anticipos as $key => $r) {

			$editaranticipo=Anticipo::where('flete_id',$id)->where('estado','PAGADO')
            ->update([
                      'estado'=>'ANULADO'
                     ]);

			$datosAnticipo=new Anticipo();
			$nremitoanticipo=Anticipo::orderBy('id','DESC')->limit(1)->get();
			if(count($nremitoanticipo)>0){
		    	$datosAnticipo->nroremito=$nremitoanticipo[0]->nroremito+1;
		    }
		    else{
		    	$datosAnticipo->nroremito=300000;
		    }
		    $importe=(-1)*$r->importe;
		    $datosAnticipo->importe=$importe;
		    $datosAnticipo->flete_id=$datoFlete[0]->id;
		    $datosAnticipo->chofer_id=$datoFlete[0]->chofer_id;
		    $datosAnticipo->estado='CANCELACION';
		    $datosAnticipo->fecha=$date;
		    $datosAnticipo->observacion='Anticipo anulado por cancelacion de Flete n° '.$datoFlete[0]->nroremito;
			$datosAnticipo->save();


			// $editarchofer=Chofer::where('id',$datoFlete[0]->chofer_id)
   //          ->update([
   //                    'saldo'=>$r->importe+$datochofer[0]->saldo
   //                   ]);


		}
		//// FIN DE CANCELACION DE ANTICIPOS

        //CANCELACION DE TODOS LOS VALES
        $vales=Vale::where('flete_id',$id)->where('estado','INGRESADO')->get();

		foreach ($vales as $key => $r) {

			$editarvale=Vale::where('flete_id',$id)->where('estado','INGRESADO')
            ->update([
                      'estado'=>'ANULADO'
                     ]);

			$datosVale=new Vale();
			$nremitovale=Vale::orderBy('id','DESC')->limit(1)->get();
	
			$datoestacion=Estacion::where('id',$r->estacion_id)->get();


			if(count($nremitovale)>0){
		    	$datosVale->nroremitovale=$nremitovale[0]->nroremitovale+1;
		    }
		    else{
		    	$datosVale->nroremitovale=200000;
		    }

		    $datosVale->estacion_id=$r->estacion_id;
			$datosVale->flete_id=$datoFlete[0]->id;
			$datosVale->fecha=$date;
			$datosVale->cantidad=(-1)*$r->cantidad;
			$datosVale->nroremitoestacion=$r->nroremitoestacion;
			$datosVale->estado='CANCELADO';
			$datosVale->observacion='Vale anulado por cancelacion de Flete n° '.$datoFlete[0]->nroremito;
			$datosVale->save();

			$editarestacion=Estacion::where('id',$r->estacion_id)
                ->update([
                          'saldo'=>$datoestacion[0]->saldo-$r->cantidad
                          ]);

		}


		$remitos=RemitoFlete::where('flete_id',$id)->where('estado','INGRESADO')->get();

		foreach ($remitos as $key => $r) {

			$editarremito=RemitoFlete::where('flete_id',$id)->where('estado','INGRESADO')
            ->update([
                      'estado'=>'ANULADO'
                     ]);

			$datosRemito=new RemitoFlete();
			$nremito=RemitoFlete::orderBy('id','DESC')->limit(1)->get();
	
			//$datoestacion=Estacion::where('id',$r->estacion_id)->get();


			if(count($nremito)>0){
		    	$datosRemito->nroremito=$nremito[0]->nroremito+1;
		    }
		    else{
		    	$datosRemito->nroremito=400000;
		    }

		    $datosRemito->flete_id=$datoFlete[0]->id;
			$datosRemito->cliente_id=$r->cliente_id;
			$datosRemito->modo='C';
			$datosRemito->estado='CANCELADO';
			$datosRemito->observacion='Remito anulado por cancelacion de Flete n° '.$datoFlete[0]->nroremito;
			$datosRemito->save();


		}

		//// FIN DE CANCELACION DE remitos

 		//CANCELACION DE MOVIMIENTO DE CAJA
		$movimientocaja=new MovimientoCaja();
		$movimientocaja->tipo='CANCELACION FLETE';
		$movimientocaja->tipo_movimiento='INGRESO';
		$movimientocaja->descripcion='Devolucion por cancelacion de Flete';
		$movimientocaja->fecha=$date;
		$movimientocaja->importe=$datoFlete[0]->anticipos;
		$movimientocaja->caja_id=2;


		$consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
		$importe_final_anterior=0;
      	if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final+$datoFlete[0]->anticipos;
        }
      }  
      $movimientocaja->importe_final=$importe_final_anterior;
      $movimientocaja->save();

		flash::success('Se cancelo el FLETE');
         return Redirect('fletes');


	}

    /// FIJARSE ESTO PARA HACER LA CANCELACION DEL FLETE
    public function guardarfinalizarflete(Request $request,$id)
    {
    	
    	/*VALIDACION -----------------------------------------*/
        $campos=[
            'valorflete'=>'required|numeric',
            'kmfin'=>'required|integer',
            'importe'=>'required|numeric',
            'descripcion'=>'required|string|max:60',
            'cliente_id1'   =>'required',
            'descripciontarifa'=>'required',
            'remito1'=>'required'
        ];
 		$Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

//validacion IDA1
		if($request->clientedev1!=null || $request->valepalletd1 != null || $request->palletd1)
		{
		$campos=[
            'clientedev1'   =>'required',
            'valepalletd1'=>'required|integer',
            'palletd1'=>'required|integer',
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}		

////////////////FIN VALIDACION IDA1

//validacion IDA2
		if($request->cliente_id2!=null || $request->remito2 != null)
		{

		$campos=[
            'cliente_id2'   =>'required',
            'remito2'=>'required'
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}
		if($request->clientedev2!=null || $request->valepalletd2 != null || $request->palletd2)
		{
		$campos=[
            'clientedev2'   =>'required',
            'valepalletd2'=>'required|integer',
            'palletd2'=>'required|integer',
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}	
///////// FIN VADILADCION IDA2


		//validacion IDA3
		if($request->cliente_id3!=null || $request->remito3 != null)
		{

		$campos=[
            'cliente_id3'   =>'required',
            'remito3'=>'required'
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}
		if($request->clientedev3!=null || $request->valepalletd3 != null || $request->palletd3)
		{
		$campos=[
            'clientedev3'   =>'required',
            'valepalletd3'=>'required|integer',
            'palletd3'=>'required|integer',
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}	
///////// FIN VADILADCION IDA3

		//validacion IDA4
		if($request->cliente_id4!=null || $request->remito4 != null)
		{

		$campos=[
            'cliente_id4'   =>'required',
            'remito4'=>'required'
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}
		if($request->clientedev4!=null || $request->valepalletd4 != null || $request->palletd4)
		{
		$campos=[
            'clientedev4'   =>'required',
            'valepalletd4'=>'required|integer',
            'palletd4'=>'required|integer'
        ];
         	$Mensaje=["required"=>'El :attribute es requerido'];
        	$this->validate($request,$campos,$Mensaje);
		}	
///////// FIN VADILADCION IDA3

///// VALIDACION DE VALE1
		 if($request->vale1!=null || $request->nroremitoestacion1 != null || $request->estacion_id1 != null){

 
        $campos=[
            'vale1'=>'required|integer',
            'nroremitoestacion1'=>'required|string|max:30',
            'estacion_id1'=>'required'
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    	}	
///// FIN DE VALIDACION VALE1


///// VALIDACION DE VALE2
		 if($request->vale2!=null || $request->nroremitoestacion2 != null || $request->estacion_id2 != null){

 
        $campos=[
            'vale2'=>'required|integer',
            'nroremitoestacion2'=>'required|string|max:30',
            'estacion_id2'=>'required'
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
    }
///// FIN DE VALIDACION VALE2


///// VALIDACION DE VALE3
		 if($request->vale3!=null || $request->nroremitoestacion3 != null || $request->estacion_id3 != null){

 
        $campos=[
            'vale3'=>'required|integer',
            'nroremitoestacion3'=>'required|string|max:30',
            'estacion_id3'=>'required'
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    }
///// FIN DE VALIDACION VALE3


/*-----------------------------------------------------------------
					FIN DE LAS VALIDACIONES
-------------------------------------------------------------------*/


try{//esto es para que si hay un error en un insert en una table no grabe en la otra
		DB::beginTransaction(); 

/// actualizar la cta cte del chofer -----------------------------

        $date = new \DateTime();
 		$datoFlete=Flete::where('id',$id)->limit(1)->get();

 		$chofer_id=$datoFlete[0]->chofer_id; 		
 		$remito_flete =$datoFlete[0]->nroremito;
		$datochofer=Chofer::where('id',$chofer_id)->limit(1)->get();

		$saldofinalcho1=$datochofer[0]->saldo+$request->valorflete;
		$saldofinalcho2=$datochofer[0]->saldo+$request->valorflete+$request->importe;
		$editarchofer=Chofer::where('id',$chofer_id)
        ->update([
                  'saldo'=>$datochofer[0]->saldo+$request->valorflete+$request->importe,
                 ]);
//------------------- fin de la actualizacion --------------------

		// GUARDAR REMITO 1
		 if($request->cliente_id1 != null){
		    $datosRemito=new RemitoFlete();
		    $datosRemito->flete_id=$id;
		    $datosRemito->modo='IDA';
		    $datosRemito->estado='INGRESADO';
		    $datosRemito->cliente_id=$request->cliente_id1;
		    $datosRemito->nroremito=$request->remito1;
		    if($request->pallete1==null)
		    {$datosRemito->palletentregados=0;}
		    else
		    {$datosRemito->palletentregados=$request->pallete1;}	
		    


			//editar los paller de los clientes
			$acumulado=Cliente::where('id',$request->cliente_id1)->orderBy('id','DESC')->limit(1)->get();
			$editarcliente=Cliente::where('id',$request->cliente_id1)
              ->update([
                        'saldopallet'=>$acumulado[0]->saldopallet+$request->pallete1
                       ]);


		    if($request->clientedev1 != null)
		    {
		    $datosRemito->palletdevueltos=$request->palletd1;
			$datosRemito->clientepalletdevuelto=$request->clientedev1;
			$datosRemito->valepalletdevueltos=$request->valepalletd1;	

			//editar los paller de los clientes
			$acumulado2=Cliente::where('nombre',$request->clientedev1)->orderBy('id','DESC')->limit(1)->get();
            $editarcliente=Cliente::where('nombre',$request->clientedev1)
            ->update([
                      'saldopallet'=>$acumulado2[0]->saldopallet-$request->palletd1
                      
                      ]);
		    }
			$datosRemito->save();


			//guardar comprobante del remito en ctactec
	        $acumulado=Cliente::where('id',$request->cliente_id1)->orderBy('id','DESC')->limit(1)->get();

	        $datosComprobante=new CtaCteC();
	        $datosComprobante->tipocomprobante='REMITO';
	        $datosComprobante->nrocomprobante=$request->remito1;
	        $datosComprobante->debe=0;
	        $datosComprobante->haber=0;
	        $datosComprobante->importesubtotal=0;
	        $datosComprobante->acumulado=$acumulado[0]->saldo;
	        $datosComprobante->observacion=$request->observacion1;
			$datosComprobante->cliente_id=$request->cliente_id1;
			$datosComprobante->fechaemision=$date;
			$datosComprobante->fechavencimiento=$date;
			$datosComprobante->flete=1;
			$datosComprobante->save();
		}
		// TERMINAR GUARDAR REMITO1!!!!





		// GUARDAR REMITO 2
		 if($request->cliente_id2 != null){
		    $datosRemito=new RemitoFlete();
		    $datosRemito->flete_id=$id;
		    $datosRemito->modo='IDA';
		    $datosRemito->estado='INGRESADO';
		    $datosRemito->cliente_id=$request->cliente_id2;
		    $datosRemito->nroremito=$request->remito2;
		    $datosRemito->palletentregados=$request->pallete2;


			//editar los paller de los clientes
			$acumulado=Cliente::where('id',$request->cliente_id2)->orderBy('id','DESC')->limit(1)->get();
			$editarcliente=Cliente::where('id',$request->cliente_id2)
              ->update([
                        'saldopallet'=>$acumulado[0]->saldopallet+$request->pallete2
                       ]);


		    if($request->clientedev2 != null)
		    {
		    $datosRemito->palletdevueltos=$request->palletd2;
			$datosRemito->clientepalletdevuelto=$request->clientedev2;
			$datosRemito->valepalletdevueltos=$request->valepalletd2;	

			//editar los paller de los clientes
			$acumulado2=Cliente::where('nombre',$request->clientedev2)->orderBy('id','DESC')->limit(1)->get();
            $editarcliente=Cliente::where('nombre',$request->clientedev2)
            ->update([
                      'saldopallet'=>$acumulado2[0]->saldopallet-$request->palletd2
                      
                      ]);
		    }
			$datosRemito->save();


			//guardar comprobante del remito en ctactec
	        $acumulado=Cliente::where('id',$request->cliente_id2)->orderBy('id','DESC')->limit(1)->get();

	        $datosComprobante=new CtaCteC();
	        $datosComprobante->tipocomprobante='REMITO';
	        $datosComprobante->nrocomprobante=$request->remito2;
	        $datosComprobante->debe=0;
	        $datosComprobante->haber=0;
	        $datosComprobante->importesubtotal=0;
	        $datosComprobante->acumulado=$acumulado[0]->saldo;
	        $datosComprobante->observacion=$request->observacion2;
			$datosComprobante->cliente_id=$request->cliente_id2;
			$datosComprobante->fechaemision=$date;
			$datosComprobante->fechavencimiento=$date;
			$datosComprobante->flete=1;
			$datosComprobante->save();
		}
		// TERMINAR GUARDAR REMITO2!!!!




		// GUARDAR REMITO 3
		 if($request->cliente_id3 != null){
		    $datosRemito=new RemitoFlete();
		    $datosRemito->flete_id=$id;
		    $datosRemito->modo='IDA';
		    $datosRemito->estado='INGRESADO';
		    $datosRemito->cliente_id=$request->cliente_id3;
		    $datosRemito->nroremito=$request->remito3;
		    $datosRemito->palletentregados=$request->pallete3;


			//editar los paller de los clientes
			$acumulado=Cliente::where('id',$request->cliente_id3)->orderBy('id','DESC')->limit(1)->get();
			$editarcliente=Cliente::where('id',$request->cliente_id3)
              ->update([
                        'saldopallet'=>$acumulado[0]->saldopallet+$request->pallete3
                       ]);


		    if($request->clientedev3 != null)
		    {
		    $datosRemito->palletdevueltos=$request->palletd3;
			$datosRemito->clientepalletdevuelto=$request->clientedev3;
			$datosRemito->valepalletdevueltos=$request->valepalletd3;	

			//editar los paller de los clientes
			$acumulado3=Cliente::where('nombre',$request->clientedev3)->orderBy('id','DESC')->limit(1)->get();
            $editarcliente=Cliente::where('nombre',$request->clientedev3)
            ->update([
                      'saldopallet'=>$acumulado3[0]->saldopallet-$request->palletd3
                      
                      ]);
		    }
			$datosRemito->save();


			//guardar comprobante del remito en ctactec
	        $acumulado=Cliente::where('id',$request->cliente_id3)->orderBy('id','DESC')->limit(1)->get();

	        $datosComprobante=new CtaCteC();
	        $datosComprobante->tipocomprobante='REMITO';
	        $datosComprobante->nrocomprobante=$request->remito3;
	        $datosComprobante->debe=0;
	        $datosComprobante->haber=0;
	        $datosComprobante->importesubtotal=0;
	        $datosComprobante->acumulado=$acumulado[0]->saldo;
	        $datosComprobante->observacion=$request->observacion3;
			$datosComprobante->cliente_id=$request->cliente_id3;
			$datosComprobante->fechaemision=$date;
			$datosComprobante->fechavencimiento=$date;
			$datosComprobante->flete=1;
			$datosComprobante->save();
		}
		// TERMINAR GUARDAR REMITO3!!!

		// GUARDAR REMITO 4
		 if($request->cliente_id4 != null){
		    $datosRemito=new RemitoFlete();
		    $datosRemito->flete_id=$id;
		    $datosRemito->modo='IDA';
		    $datosRemito->estado='INGRESADO';
		    $datosRemito->cliente_id=$request->cliente_id4;
		    $datosRemito->nroremito=$request->remito4;
		    $datosRemito->palletentregados=$request->pallete4;


			//editar los paller de los clientes
			$acumulado=Cliente::where('id',$request->cliente_id4)->orderBy('id','DESC')->limit(1)->get();
			$editarcliente=Cliente::where('id',$request->cliente_id4)
              ->update([
                        'saldopallet'=>$acumulado[0]->saldopallet+$request->pallete4
                       ]);


		    if($request->clientedev4 != null)
		    {
		    $datosRemito->palletdevueltos=$request->palletd4;
			$datosRemito->clientepalletdevuelto=$request->clientedev4;
			$datosRemito->valepalletdevueltos=$request->valepalletd4;	

			//editar los paller de los clientes
			$acumulado4=Cliente::where('nombre',$request->clientedev4)->orderBy('id','DESC')->limit(1)->get();
            $editarcliente=Cliente::where('nombre',$request->clientedev4)
            ->update([
                      'saldopallet'=>$acumulado4[0]->saldopallet-$request->palletd4
                      
                      ]);
		    }
			$datosRemito->save();


			//guardar comprobante del remito en ctactec
	        $acumulado=Cliente::where('id',$request->cliente_id4)->orderBy('id','DESC')->limit(1)->get();

	        $datosComprobante=new CtaCteC();
	        $datosComprobante->tipocomprobante='REMITO';
	        $datosComprobante->nrocomprobante=$request->remito4;
	        $datosComprobante->debe=0;
	        $datosComprobante->haber=0;
	        $datosComprobante->importesubtotal=0;
	        $datosComprobante->acumulado=$acumulado[0]->saldo;
	        $datosComprobante->observacion=$request->observacion4;
			$datosComprobante->cliente_id=$request->cliente_id4;
			$datosComprobante->fechaemision=$date;
			$datosComprobante->fechavencimiento=$date;
			$datosComprobante->flete=1;
			$datosComprobante->save();
		}
		// TERMINAR GUARDAR REMITO4!!!



       	// GUARDAR VALES 1
        if($request->estacion_id1 != null)
        {
		    $datosVale=new Vale();
			$nremitovale=Vale::orderBy('id','DESC')->limit(1)->get();
			
			$datoestacion=Estacion::where('id',$request->estacion_id1)->get();

			if(count($nremitovale)>0){
		    	$datosVale->nroremitovale=$nremitovale[0]->nroremitovale+1;
		    }
		    else{
		    	$datosVale->nroremitovale=200000;
		    }
		    $datosVale->estacion_id=$request->estacion_id1;
			$datosVale->flete_id=$id;
			$datosVale->fecha=$date;
			$datosVale->cantidad=$request->vale1;
			$datosVale->nroremitoestacion=$request->nroremitoestacion1;
			$datosVale->estado='INGRESADO';
			$datosVale->save();

			$editarestacion=Estacion::where('id',$request->estacion_id1)
                ->update([
                          'saldo'=>$datoestacion[0]->saldo+$datosVale->cantidad,
                          ]);


		}
		// TERMINAR GUARDAR VALE!!!!
		// GUARDAR VALES 2
		 if($request->estacion_id2!=null){
		        $datosVale=new Vale();
				$nremitovale=Vale::orderBy('id','DESC')->limit(1)->get();

				$datoestacion=Estacion::where('id',$request->estacion_id2)->get();

				if(count($nremitovale)>0){
			    	$datosVale->nroremitovale=$nremitovale[0]->nroremitovale+1;
			    }
			    else{
			    	$datosVale->nroremitovale=200000;
			    }
			    $datosVale->estacion_id=$request->estacion_id2;
				$datosVale->flete_id=$id;
				$datosVale->fecha=$date;
				$datosVale->cantidad=$request->vale2;
				$datosVale->nroremitoestacion=$request->nroremitoestacion2;
				$datosVale->estado='INGRESADO';
				$datosVale->save();



				$editarestacion=Estacion::where('id',$request->estacion_id2)
                ->update([
                          'saldo'=>$datoestacion[0]->saldo+$datosVale->cantidad
                          ]);
		}
		// TERMINAR GUARDAR VALE!!!!

				// GUARDAR VALES 3
		 if($request->estacion_id3!=null){
		        $datosVale=new Vale();
				$nremitovale=Vale::orderBy('id','DESC')->limit(1)->get();

				$datoestacion=Estacion::where('id',$request->estacion_id3)->get();

				if(count($nremitovale)>0){
			    	$datosVale->nroremitovale=$nremitovale[0]->nroremitovale+1;
			    }
			    else{
			    	$datosVale->nroremitovale=200000;
			    }
			    $datosVale->estacion_id=$request->estacion_id3;
				$datosVale->flete_id=$id;
				$datosVale->fecha=$date;
				$datosVale->cantidad=$request->vale3;
				$datosVale->nroremitoestacion=$request->nroremitoestacion3;
				$datosVale->estado='INGRESADO';
				$datosVale->save();

				$editarestacion=Estacion::where('id',$request->estacion_id3)
                ->update([
                          'saldo'=>$datoestacion[0]->saldo+$datosVale->cantidad,
                          ]);
		}
		// TERMINAR GUARDAR VALE!!!!

		$datosGastos=new GastoVarioFlete(request()->except('_token'));
		$datosGastos->fecha=$date;
		$datosGastos->save();

		$movimientocaja=new MovimientoCaja();
		$movimientocaja->tipo='GASTOS VARIOS';
		$movimientocaja->tipo_movimiento='EGRESO';
		$movimientocaja->descripcion='Gastos Varios por flete';
		$movimientocaja->fecha=$date;
		$movimientocaja->importe=$request->importe;
		$movimientocaja->caja_id='2';


		$consultamovimientos=MovimientoCaja::where('caja_id', $movimientocaja->caja_id)->orderBy('id','DESC')->limit(1)->get();
		$importe_final_anterior=0;
      	if($consultamovimientos <> null){
        foreach ($consultamovimientos as $consultamovimiento) {
          $importe_final_anterior=$consultamovimiento->importe_final;
        }
      }  
      $movimientocaja->importe_final=$importe_final_anterior-$request->importe;
      $movimientocaja->save();

		//datos para guardar en flete y el movimiento de caja
		
		$consultasumavales=Vale::where('flete_id',$id)->sum('cantidad');//suma de vales

		$consultasumaanticipos=Anticipo::where('flete_id',$id)->sum('importe');//suma de anticipos
		//$totalvales=$consultasumavales+$request->combustibletucuman;
		$consultakminicio=Flete::where('id',$id)->select('nroremito','camion_id','kminicio','valorflete')->get();
		$kminicio=$consultakminicio[0]->kminicio;// km con el que incia el flete
		$kmtransitados=$request->kmfin-$kminicio;

		$promedio=$kmtransitados/$consultasumavales;
		$montoaliquidar=$request->valorflete+$request->importe-$consultasumaanticipos;
		$estado='FINALIZADO';

// QUE VAMOS A HACER CON EL DESCUENTO EN QUE CAJA / CON QUE SE LE PAGA AL CHOFER
		$datosFlete=new Flete(request()->except('_token'));
		$datosFlete->fechafin=$date;
		$datosFlete->kmtransitados=$kmtransitados;
		$datosFlete->combustibletucuman=$consultasumavales;//$request->combustibletucuman;
		$datosFlete->combustibledestino=$consultasumavales;
		$datosFlete->combustiblegasto=$consultasumavales;
		$datosFlete->promedio=$promedio;
		$datosFlete->montoaliquidar=$montoaliquidar;
		$datosFlete->estado=$estado;

   		$editarflete=Flete::where('id',$id)
                ->update([
                          'fechafin'=>$date,
                          'kmfin'=>$request->kmfin,
                          'kmtransitados'=>$kmtransitados,
                          //'combustibletucuman'=>$request->combustibletucuman,
                          //'combustibledestino'=>$consultasumavales,
                          'combustiblegasto'=>$consultasumavales,
                          'promedio'=>$promedio,
                          'montoaliquidar'=>$montoaliquidar,
                          'valorflete'=>$request->valorflete,
                          'descripciontarifa'=>$request->descripciontarifa,
                          'estado'=>$estado
                          ]);
        $editarcamion=Camion::where('id',$consultakminicio[0]->camion_id)
                ->update([
                          'km'=>$request->kmfin,
                          ]);





        $datosctactecho=new CtaCteCho();
     	$datosctactecho->tipocomprobante="PAGO-FLETE";
     	$datosctactecho->nrocomprobante=$remito_flete;
     	$datosctactecho->fechaemision=$date;
     	$datosctactecho->fechavencimiento=$date;
     	$datosctactecho->haber=0;
     	$datosctactecho->debe=$request->valorflete;
     	$datosctactecho->acumulado=$saldofinalcho1;
		$datosctactecho->chofer_id=$chofer_id;
		$datosctactecho->observacion="Flete Nro. ".$remito_flete;
 		$datosctactecho->save();


        $datosctactecho=new CtaCteCho();
     	$datosctactecho->tipocomprobante="GASTOS-FLETE";
     	$datosctactecho->nrocomprobante=$remito_flete;
     	$datosctactecho->fechaemision=$date;
     	$datosctactecho->fechavencimiento=$date;
     	$datosctactecho->haber=0;
     	$datosctactecho->debe=$request->importe;
     	$datosctactecho->acumulado=$saldofinalcho2;
		$datosctactecho->chofer_id=$chofer_id;
		$datosctactecho->observacion=$request->descripciontarifa;
 		$datosctactecho->save();


 		DB::commit();
		 	flash::success('Se finalizo el Flete con remito numero: '.$consultakminicio[0]->nroremito);
	        return view('fletes.final')
	        ->with('status','1')
	        ->with('datochofer',$datochofer)
			->with('datogastos',$datosGastos->importe)
			->with('consultasumaanticipos',$consultasumaanticipos)
        	->with('datoFlete',$datoFlete);

		} catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect ("/fletes")->with('status','2');
	    }
 		flash::success('Se finalizo el Flete con remito numero: '.$consultakminicio[0]->nroremito);
			$datoFlete->each(function($datoFlete){
           $datoFlete->chofer;
           $datoFlete->camion;
            

        });





      }
    public function listarPdf($id){

        
        $anticipo=Anticipo::where('id',$id)->get();
        //esto es para las relacion de la tabla anticipo con
        $anticipo->each(function($anticipo){
            $anticipo->chofer;
            $anticipo->flete;
            
        });


        $pdf=\PDF::loadView('pdf.anticipopdf',['anticipo'=>$anticipo]);
        return $pdf->download('anticipos.pdf');

    }

     public function listarPdfflete($id){

     	$datoflete=Flete::where('id',$id)->get();
     	$datoflete->each(function($datoflete){
            $datoflete->chofer;
            $datoflete->camion;
            
       });

     	$datoremitos=RemitoFlete::where('flete_id',$id)->get();

     	$datoremitos->each(function($datoremitos){
            $datoremitos->cliente;
       });

     	$datovales=Vale::where('flete_id',$id)->get();

     	$datovales->each(function($datovales){
            $datovales->estacion;
       });

        $consultasumaanticipos=Anticipo::where('flete_id',$id)->sum('importe');//suma de anticipos
        $datosGastos=GastoVarioFlete::where('flete_id',$id)->sum('importe');
        $consultasumavales=Vale::where('flete_id',$id)->sum('cantidad');

        $pdf=\PDF::loadView('pdf.reportefletepdf',['datoflete'=>$datoflete,'consultasumaanticipos'=>$consultasumaanticipos,'datosGastos'=>$datosGastos
        	,'consultasumavales'=>$consultasumavales,'datoremitos'=>$datoremitos,'datovales'=>$datovales])
        ->setPaper('a4','landscape');
        return $pdf->download('Flete.pdf');
        
    }

	
}

