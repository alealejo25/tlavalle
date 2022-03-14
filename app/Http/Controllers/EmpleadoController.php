<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Http\Requests\CategoriaFormRequest;
use Laracasts\Flash\Flash;
use DB;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EmpleadoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos=Empleado::search($request->name)->orderBy('nombre','ASC')->paginate(30);
        
        return view('abms.empleados.index')
            ->with('datos',$datos);
    }
    public function create()
    {
        $datos=Empleado::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('abms.empleados.create')
               ->with('datos',$datos);
    }
    public function store(Request $request)
    {
    /*VALIDACION -----------------------------------------*/
    $campos=[
        'nombre'=>'required|string|max:60',
        'apellido'=>'required|string|max:60',
        'dni'=>'required|max:8',
        'direccion'=>'required|string|max:100',
        'fechanac'=>'required',
        'nrocelular'=>'required',
        'saldo'=>'required|numeric',
        'area'=>'required',
        'foto'=>'image|mimes:gif,jpeg,png',
        'sueldoactual'=>'required|numeric',
        'sueldoanterior'=>'required|numeric'
    ];
    $Mensaje=["required"=>'El :attribute es requerido'];
    $this->validate($request,$campos,$Mensaje);
  
    $file=$request->file('foto');
    if($file<>"")
    {
    $foto=$file->getClientOriginalName();
    $foto2=$request->dni . $foto;
    \Storage::disk('local')->put($foto2,\File::get($file));
    }
    else
    {
        $foto2="sinfoto.jpg";
    }
    /* forma de grabar los datos en una variable */
    $datos=new Empleado(request()->except('_token'));

    $datos->foto=$foto2;
    $datos->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('Se a creado el Empleado con exito'); 
       return Redirect('abms/empleados/')->with('Mensaje','Empleado Agregado con éxito');
    }

    public function edit($id)
    {

        $datos=Empleado::find($id);
      
        return view('abms.empleados.edit')
            ->with('datos',$datos);
    }



     public function update(Request $request, $id)
    {

                    $campos=[
                        'nombre'=>'required|string|max:30',
                        'apellido'=>'required|string|max:30',
                        'dni'=>'required|max:8',
                        'direccion'=>'required|string|max:100',
                        'fechanac'=>'required',
                        'nrocelular'=>'required|max:100',
                        'area'=>'required|max:30',
                        'sueldoactual'=>'required|numeric',
                        'sueldoanterior'=>'required|numeric',
                        'foto'=>'image|mimes:gif,jpeg,png',
                        'saldo'=>'required|numeric'
                    ];
                    $Mensaje=["required"=>'El :attribute es requerido'];
                    $this->validate($request,$campos,$Mensaje); 
 


    $file=$request->file('foto');

    if($file<>"")
    {
    $foto=$file->getClientOriginalName();
    $foto2=$request->dni . $foto;
    \Storage::disk('local')->put($foto2,\File::get($file));
    }
   
    
     if($file<>"")
    {
    $actualizarproveedor=Empleado::where('id',$id)
                        ->update([
                                'nombre'=>$request->nombre,
                                'apellido'=>$request->apellido,
                                'dni'=>$request->dni,
                                'direccion'=>$request->direccion,
                                'fechanac'=>$request->fechanac,
                                'nrocelular'=>$request->nrocelular,
                                'area'=>$request->area,
                                'sueldoactual'=>$request->sueldoactual,
                                'sueldoanterior'=>$request->sueldoanterior,
                                'saldo'=>$request->saldo,
                                'foto'=>$foto2
                                 ]);
    }
    else
    {
          $actualizarproveedor=Empleado::where('id',$id)
                        ->update([
                                'nombre'=>$request->nombre,
                                'apellido'=>$request->apellido,
                                'dni'=>$request->dni,
                                'direccion'=>$request->direccion,
                                'fechanac'=>$request->fechanac,
                                'nrocelular'=>$request->nrocelular,
                                'area'=>$request->area,
                                'sueldoactual'=>$request->sueldoactual,
                                'sueldoanterior'=>$request->sueldoanterior,
                                'saldo'=>$request->saldo,
                                
                                 ]); 
    }


        

        return Redirect('abms/empleados')->with('Mensaje','Empleado Modificado con éxito!!!!!');
    }

}
