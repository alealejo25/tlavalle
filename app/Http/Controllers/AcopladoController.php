<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Acoplado;
use App\Camion;
use App\Http\Requests\CategoriaFormRequest;

use Laracasts\Flash\Flash;

use DB;

use Barryvdh\DomPDF\Facade as PDF;




class AcopladoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(Request $request)
    {
        //$datos['acoplados']=Acoplado::paginate(10);
        $acoplados=Acoplado::search($request->name)->orderBy('dominio','ASC')->paginate(10);

        //esto es para las relacion de la tabla acoplados con camion
        $acoplados->each(function($acoplados){
        	$acoplados->camion;
        });
		//----------------------------------------------------------
        //dd($acoplados);
        return view('abms.acoplados.index')
        	->with('acoplados',$acoplados);

    }
    public function create()
    {
    	$camiones=Camion::orderBy('dominio','ASC')->pluck('dominio','id');
   	
        return view('abms.acoplados.create')
        		->with('camiones',$camiones);
    }

    public function store(Request $request)
    {


        if (is_null($request->camion_id))
        {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'dominio'=>'required|string|max:8',
            'modelo'=>'required|string|max:30',
            'marca'=>'required|string|max:30',
            'año'=>'required|string|max:4',
                   
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        }
        else
        {
            $campos=[
                            'dominio'=>'required|string|max:8',
                            'modelo'=>'required|string|max:30',
                            'marca'=>'required|string|max:30',
                            'año'=>'required|string|max:4'
                            ];
                        $Mensaje=["required"=>'El :attribute es requerido',
                                  "unique"=>'El dominio de camion, ya se encuentra asociado a otro acoplado'
                                ];
                        $this->validate($request,$campos,$Mensaje);   
        }



        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        /* forma de grabar los datos en una variable */
        $datosAcoplado=new Acoplado(request()->except('_token'));
        $datosAcoplado->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('se a creado el Acoplado'); 
       return Redirect('abms/acoplados/')->with('Mensaje','Acoplado Agregado con éxito');
    }

    public function edit($id)
    {
        $acoplados=Acoplado::find($id);
        $camiones= Camion::orderBy('id','DESC')->pluck('dominio','id');
        return view('abms.acoplados.edit')
            ->with('camiones',$camiones)
            ->with('acoplados',$acoplados);
           
    }

     public function update(Request $request, $id)
    {

        if (is_null($request->camion_id))
        {
            $campos=[
            'dominio'=>'required|string|max:8',
            'modelo'=>'required|string|max:30',
            'marca'=>'required|string|max:30',
            'año'=>'required|string|max:4'
            ];
        $Mensaje=["required"=>'El :attribute es requerido',
                  
                ];
        $this->validate($request,$campos,$Mensaje);
        }
        else
        {
            $consulta=Acoplado::where('id',$id)->get();
            
                if($request->camion_id==$consulta[0]->camion_id){
                $campos=[
                            'dominio'=>'required|string|max:8',
                            'modelo'=>'required|string|max:30',
                            'marca'=>'required|string|max:30',
                            'año'=>'required|string|max:4'
                            ];
                        $Mensaje=["required"=>'El :attribute es requerido',
                                  "unique"=>'El dominio de camion, ya se encuentra asociado a otro acoplado'
                                ];
                        $this->validate($request,$campos,$Mensaje);   
                }
                else
                {
                $campos=[
                    'dominio'=>'required|string|max:8',
                    'modelo'=>'required|string|max:30',
                    'marca'=>'required|string|max:30',
                    'año'=>'required|string|max:4',
                    'camion_id'=> 'unique:acoplados,camion_id'
            
                ];
                $Mensaje=["required"=>'El :attribute es requerido',
                        "unique"=>'El dominio de camion, ya se encuentra asociado a otro acoplado'
                ];
                $this->validate($request,$campos,$Mensaje);  
                        }
        }
        
       
        
// $camiones=Camion::orderBy('dominio','ASC')->pluck('dominio','id');



        $datosAcoplado=request()->except(['_token','_method']);
      

        Acoplado::where('id','=',$id)->update($datosAcoplado);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/acoplados')->with('Mensaje','Acoplado Modificadoddd con éxito!!!!!');
    }
    public function destroy($id)
        {
            
            Acoplado::destroy($id);
            //return redirect('/abms/camiones');
            return Redirect('abms/acoplados')->with('Mensaje','Acoplado Eliminado con éxito!!!!!!');

            //codigo para eliminar fotos
            // $camion=Camion::findOrFail($id);
            // if (Storage::delete('public/'.$camion->foto)){
            //     Camion::destroy($id);
            // }
            
            // return redirect('/abms/camiones');
        }
    

public function exportPdf(){
        $acoplados=Acoplado::orderBy('dominio','ASC')->paginate(10);

        //esto es para las relacion de la tabla acoplados con camion
        $acoplados->each(function($acoplados){
            $acoplados->camion;
        });
        //----------------------------------------------------------
        //dd($acoplados);

        $pdf=PDF::loadView('/abms/acoplados/pdf',compact('acoplados'));
       
        
        return $pdf->download('acoplados.pdf');

           // return view('abms.bienesdeuso.edit',compact('biendeuso'));
}
    public function listarPdf(){

        $acoplados=Acoplado::orderBy('dominio','ASC')->get();
        $cont=Acoplado::count();
        //esto es para las relacion de la tabla acoplados con camion
        $acoplados->each(function($acoplados){
            $acoplados->camion;
        });

        $pdf=\PDF::loadView('pdf.acopladospdf',['acoplados'=>$acoplados,'cont'=>$cont]);
        return $pdf->download('acoplados.pdf');

    }


}


