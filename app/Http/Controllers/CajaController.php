<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caja;

class CajaController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
public function index(Request $request)
    {

        $datos['cajas']=Caja::paginate(10);
        return view('abms.cajas.index',$datos);
    }

public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'denominacion'=>'required|string|max:40',
            'descripcion'=>'required|string|max:60',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosCaja=request()->except('_token');
       Caja::insert($datosCaja);
       //return response()->json($datosCamion);
       return Redirect('abms/cajas')->with('Mensaje','Caja Agregada con éxito');
    }

public function create()
    {
        return view('abms.cajas.create');
    }
public function edit($id)
    {
        $cajas=Caja::find($id);
        return view('abms.cajas.edit')
            ->with('cajas',$cajas);
    }

     public function update(Request $request, $id)
    {
        $datosCajas=request()->except(['_token','_method']);
        Caja::where('id','=',$id)->update($datosCajas);
        return Redirect('abms/cajas')->with('Mensaje','Caja Modificada con éxito!!!!!');
    }

    public function destroy($id)
        {
            
            Caja::destroy($id);
            return Redirect('abms/cajas')->with('Mensaje','Caja Eliminada con éxito!!!!!!');
        }
}
