<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IngresoBruto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;

class IngresoBrutoController extends Controller
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
        $datos=IngresoBruto::orderBy('provincia','DESC')->paginate(30);
        return view('abms.ingresosbrutos.index')
        ->with('datos',$datos);
    }
    public function create()
    {
        return view('abms.ingresosbrutos.create');
    }


     public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'provincia'=>'required|string|max:45',
            'impuesto'=>'required|numeric|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

       $datos=request()->except('_token');
       IngresoBruto::insert($datos);
       //return response()->json($datosCamion);
       return Redirect('abms/ingresosbrutos')->with('Mensaje','Ingreso bruto agregado con éxito');
    }
     public function edit($id)
    {
        $datos=IngresoBruto::find($id);
        return view('abms.ingresosbrutos.edit')
            ->with('datos',$datos);
    }

    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
      

        IngresoBruto::where('id','=',$id)->update($datos);
        return Redirect('abms/ingresosbrutos')->with('Mensaje','Ingreso Bruto Modificado con éxito!!!!!');
    }
}
