<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Laracasts\Flash\Flash;
use App\Tarifa;
use App\Cliente;
use DB;



class TarifaController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        $tarifas=Tarifa::search($request->name)->orderBy('descripcion','DESC')->paginate(10);
        $tarifas->each(function($tarifas){
            $tarifas->cliente;
        });
        
        return view('abms.tarifas.index')
        ->with('tarifas',$tarifas);
    }
    public function edit($id)
    {
        $tarifas=Tarifa::find($id);
        $clientes= Cliente::orderBy('id','DESC')->pluck('nombre','id');
        return view('abms.tarifas.edit')
            ->with('clientes',$clientes)
            ->with('tarifas',$tarifas);
    }


     public function update(Request $request, $id)
    {
        $datosTarifas=request()->except(['_token','_method']);
        Tarifa::where('id','=',$id)->update($datosTarifas);
        return Redirect('abms/tarifas')->with('Mensaje','Tarifa Modificada con éxito!!!!!');
    }

    public function destroy($id)
        {
            
            Tarifa::destroy($id);
            return Redirect('abms/tarifas')->with('Mensaje','Tarifa Eliminada con éxito!!!!!!');

            //codigo para eliminar fotos
            // $camion=Camion::findOrFail($id);
            // if (Storage::delete('public/'.$camion->foto)){
            //     Camion::destroy($id);
            // }
            
            // return redirect('/abms/camiones');
        }
    public function create()
    {
        $clientes=Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('abms.tarifas.create')
        ->with('clientes',$clientes);
    }

    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'descripcion'=>'required|string|max:50',
            'importe'=>'required|integer',
            'cliente_id'=>'required'
            
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
      
       $datosTarifa=request()->except('_token');
       Tarifa::insert($datosTarifa);
       //return response()->json($datosCamion);
       return Redirect('abms/tarifas')->with('Mensaje','Tarifa Agregada con éxito');
    }


}



