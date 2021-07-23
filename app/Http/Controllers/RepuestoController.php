<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use Laracasts\Flash\Flash;

class RepuestoController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        $repuestos=Repuesto::search($request->name)->orderBy('nombre','ASC')->paginate(10);
        return view('abms.repuestos.index')
        ->with('repuestos',$repuestos);
    }

    public function create()
    {
        return view('abms.repuestos.create');
    }
    public function store(Request $request)
    {

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'codigo'=>'required|string',
            'nombre'=>'required|string|max:40',
            'cantidad'=>'required|integer',
            'marca'=>'required|string|max:40'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        /* forma de grabar los datos en una variable */
        $datosRepuesto=new Repuesto(request()->except('_token'));
        $datosRepuesto->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('se a creado el Repuesto'); 
       return Redirect('abms/repuestos/')->with('Mensaje','Repuesto Agregado con éxito');
    }

    public function edit($id)
    {
        $repuestos=Repuesto::find($id);
        return view('abms.repuestos.edit')
            ->with('repuestos',$repuestos);
           
    }
     public function update(Request $request, $id)
    {
        $datosRepuesto=request()->except(['_token','_method']);
      

        Repuesto::where('id','=',$id)->update($datosRepuesto);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/repuestos')->with('Mensaje','Repuesto Modificado con éxito!!!!!');
    }

     public function destroy($id)
        {
            
            Repuesto::destroy($id);
            return Redirect('abms/repuestos')->with('Mensaje','Repuesto Eliminado con éxito!!!!!!');

            //codigo para eliminar fotos
            // $camion=Camion::findOrFail($id);
            // if (Storage::delete('public/'.$camion->foto)){
            //     Camion::destroy($id);
            // }
            
            // return redirect('/abms/camiones');
        }

}
