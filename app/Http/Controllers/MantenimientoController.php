<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use App\Camion;
use App\Acoplado;
use App\MantenimientoC;
use App\MantenimientoA;
use App\MantenimientoCRepuesto;
use App\MantenimientoCManodeObra;
use App\MantenimientoARepuesto;
use App\MantenimientoAManodeObra;
use App\ManoObra;
use Laracasts\Flash\Flash;

class MantenimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  	public function camion(){
      $repuestos=Repuesto::orderBy('nombre','ASC')->get();
      $manodeobra=ManoObra::orderBy('denominacion','ASC')->pluck('denominacion','id');
      $camiones=Camion::where('condicion','0')->orderBy('dominio','ASC')->pluck('dominio','id');
      return view("mantenimientos.camion",compact("camiones","manodeobra","repuestos"));
    }

    public function listarcamion(){
      $camiones=MantenimientoC::orderBy('fechainicio','DESC')->paginate(10);
      $camiones->each(function($camiones){
            $camiones->camion;
          });
        return view('mantenimientos.listarcamion')
              ->with('camiones',$camiones);
             
    }
  	public function guardarcamion(Request $request){
      

  //reparar la validacion porque el resquest es un array 12/01/2021

		 $campos=[
            'camion_id'=>'required',
            'observacion'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

      $datos=$request->all();
      $datosmantenimiento= new MantenimientoC(request()->except('_token'));
      $datosmantenimiento->estado='INICIADO';
      $datosmantenimiento->save();

       $idmantenimiento=MantenimientoC::orderBy('id','DESC')->limit(1)->get();

         foreach ($idmantenimiento as $idmantenimientos) {
               $id=$idmantenimientos->id;
             }

        foreach($datos['repuesto_id'] as $key => $value){
          MantenimientoCRepuesto::create([
            "mantenimientoc_id"=>$id,
            "repuesto_id"=>$datos["repuesto_id"][$key],
            "cantidad"=>$datos["cantidad"][$key]
          ]);
          $res=Repuesto::find($value);
          $res->update(["cantidad"=>$res->cantidad-$datos["cantidad"][$key]]);
        }

        $editarcamion=Camion::where('id',$request->camion_id)
                ->update([
                          'condicion'=>'1'
                          ]);


         Flash::success('Mantenimiento del Camion iniciado con exito');
         Flash::message('Se actualizo correctamente el stock de los repuestos');
         
         return Redirect('mantenimientos/camion');
   }
/*---------------------------------------------------------------*/
 public function editarcamion($slug){
        $mantenimiento=MantenimientoC::find($slug);
        $repuestos=Repuesto::orderBy('nombre','ASC')->pluck('nombre','id');
        $manodeobra=ManoObra::orderBy('denominacion','ASC')->pluck('denominacion','id');
        $repuestousados=MantenimientoCRepuesto::where('mantenimientoc_id',$slug)->orderBy('id','DESC')->get();
        

        return view('mantenimientos.editarcamion')
            ->with('mantenimiento',$mantenimiento)
            ->with('manodeobra',$manodeobra)
            ->with('repuestousados',$repuestousados)
            ->with('repuestos',$repuestos);
  }

  



  public function guardaredicioncamion(Request $request,$id){


   $editarmantenimiento=MantenimientoC::where('id',$id)
                ->update([
                          'estado'=>'FINALIZADO',
                          'fechafin'=>$request->fechafinal
                         ]);


    $consulta=MantenimientoC::where('id',$id)->get();

    if($request->kmcaja != null){
      $datoscamion=Camion::where('id',$consulta[0]->camion_id)
                ->update([
                          'ultimoservice'=>$request->fechafinal,
                          'proximoservicecaja'=>$request->kmcaja
                        ]);
    }
    if($request->kmdiferencial != null){
      $datoscamion=Camion::where('id',$consulta[0]->camion_id)
                ->update([
                          'ultimoservice'=>$request->fechafinal,
                          'proximoservicediferencial'=>$request->kmdiferencial
                        ]);
    }
    if($request->kmmotor != null){
      $datoscamion=Camion::where('id',$consulta[0]->camion_id)
                ->update([
                          'ultimoservice'=>$request->fechafinal,
                          'proximoservicemotor'=>$request->kmmotor
                        ]);
    }

    $editarcamion=Camion::where('id',$consulta[0]->camion_id)
                ->update([
                          'condicion'=>'0'
                          ]);
    flash::success('Se finalizo el mantenimiento correctamente');
    return Redirect('mantenimientos/listarcamion');
  }
/*---------------------------------------------------------------------*/
  public function finalizarcamion($slug){
        $mantenimiento=MantenimientoC::find($slug);

       return view('mantenimientos.finalizarcamion')
            ->with('mantenimiento',$mantenimiento);
  }


 public function acoplado(){
    $repuestos=Repuesto::orderBy('nombre','ASC')->pluck('nombre','id');
    $manodeobra=ManoObra::orderBy('denominacion','ASC')->pluck('denominacion','id');
    $acoplados=Acoplado::orderBy('dominio','ASC')->pluck('dominio','id');
      return view('mantenimientos.acoplado')
            ->with('acoplados',$acoplados)
            ->with('manodeobra',$manodeobra)
            ->with('repuestos',$repuestos);
  }


  public function guardaracoplado(Request $request){

    $cantidadregistros=count($request->repuesto_id);
    $cantmanodeobra=count($request->manodeobra_id);
    $cont= 0;


    $datosmantenimiento= new MantenimientoA(request()->except('_token'));
    $datosmantenimiento->estado='INICIADO';
    //dd($datosmantenimiento);
    $datosmantenimiento->save();


    $idmantenimiento=MantenimientoA::orderBy('id','DESC')->limit(1)->get();

      foreach ($idmantenimiento as $idmantenimientos) {
            $id=$idmantenimientos->id;
          }
      while($cont < count($request->repuesto_id)){
        $datosmantenimientorepuesto= new MantenimientoARepuesto(request()->except('_token'));
        $datosmantenimientorepuesto->mantenimientoa_id=$id;
        $datosmantenimientorepuesto->repuesto_id=$request->repuesto_id[$cont];
        $datosmantenimientorepuesto->save();
        $cont=$cont + 1;
      }

      $cont= 0;
      while($cont < count($request->manodeobra_id)){
        $datosmantenimientomanodeobra= new MantenimientoAManodeObra(request()->except('_token'));
        $datosmantenimientomanodeobra->mantenimientoa_id=$id;
        $datosmantenimientomanodeobra->manodeobra_id=$request->manodeobra_id[$cont];
        $datosmantenimientomanodeobra->save();
        $cont=$cont + 1;
      }


       Flash::success('Mantenimiento del Acoplado iniciado con exito - Numero '.$id);
       Flash::message('Se actualizo correctamente el stock de los repuestos');
        
       return Redirect('mantenimientos/acoplado');
   }
   public function listaracoplado(){
      $acoplados=MantenimientoA::orderBy('fechainicio','ASC')->paginate(10);
      $acoplados->each(function($acoplados){
            $acoplados->acoplado;
          });
        return view('mantenimientos.listaracoplado')
              ->with('acoplados',$acoplados);
             
    }
   public function finalizaracoplado($slug){
        $mantenimiento=MantenimientoA::find($slug);

       return view('mantenimientos.finalizaracoplado')
            ->with('mantenimiento',$mantenimiento);
  }
public function guardaredicionacoplado(Request $request,$id){


   $editarmantenimiento=MantenimientoA::where('id',$id)
                ->update([
                          'estado'=>'FINALIZADO',
                          'fechafin'=>$request->fechafinal
                         ]);

   $datoscamion=Acoplado::where('id',$id)
                ->update([
                          'ultimoservice'=>$request->fechafinal,
                          'proximoservice'=>$request->km
                        ]);

  }

}
