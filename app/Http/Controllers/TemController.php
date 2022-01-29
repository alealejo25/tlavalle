<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;

class TemController extends Controller
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
        $datos=Tem::orderBy('provincia','DESC')->paginate(30);
        return view('abms.tem.index')
        ->with('datos',$datos);
    }
    public function create()
    {
        return view('abms.tem.create');
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
       Tem::insert($datos);
       //return response()->json($datosCamion);
       return Redirect('abms/tem')->with('Mensaje','TEM agregado con éxito');
    }
     public function edit($id)
    {
        $datos=Tem::find($id);
        return view('abms.tem.edit')
            ->with('datos',$datos);
    }

    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
      

        Tem::where('id','=',$id)->update($datos);
        return Redirect('abms/tem')->with('Mensaje','TEM Modificado con éxito!!!!!');
    }
}
