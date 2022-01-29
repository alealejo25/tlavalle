<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iva;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;

class IvaController extends Controller
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
        $datos=Iva::orderBy('descripcion','DESC')->paginate(30);
        return view('abms.iva.index')
        ->with('datos',$datos);
    }

    public function create()
    {
        return view('abms.iva.create');
    }


     public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'descripcion'=>'required|string|max:45',
            'impuesto'=>'required|numeric|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

       $datos=request()->except('_token');
       Iva::insert($datos);
       //return response()->json($datosCamion);
       return Redirect('abms/iva')->with('Mensaje','Iva agregado con éxito');
    }

    public function edit($id)
    {
        $datos=Iva::find($id);
        return view('abms.iva.edit')
            ->with('datos',$datos);
    }

    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
      

        Iva::where('id','=',$id)->update($datos);
        return Redirect('abms/iva')->with('Mensaje','Iva Modificado con éxito!!!!!');
    }
}
