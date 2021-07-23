<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Provincia;

class ClienteController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        
        $clientes=Cliente::search($request->name)->orderBy('nombre','ASC')->paginate(10);
        return view('abms.clientes.index')
            ->with('clientes',$clientes);

    }
    public function create()
    {
        $provincias=Provincia::orderBy('nombre','ASC')->pluck('nombre','nombre');
        return view('abms.clientes.create')
                ->with('provincias',$provincias);;
    }
	public function store(Request $request)
    {
         
        $campos=[
            'nombre'=>'required|string|max:50',
            'direccion'=>'required|string|max:50',
            'provincia'=>'required|string|max:40',
            'localidad'=>'required|string|max:40',
            'email1'=>'required|string|max:40',
            'telefono'=>'required|string|max:11',
            'contacto'=>'required|string|max:120',
            'clientepallet'=>'required|string',
            'telefono_contacto'=>'required|string|max:120',
            'cuit'=>'required|integer',
            'saldo'=>'required|integer',
            'provincia'=>'required',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosCliente=request()->except('_token');



       Cliente::insert($datosCliente);
       //return response()->json($datosCamion);
       return Redirect('abms/clientes')->with('Mensaje','Cliente agregado con éxito');
    }

     public function edit($id)
    {
        $clientes=Cliente::find($id);
        $provincias= Provincia::orderBy('nombre','ASC')->pluck('nombre','nombre');
        return view('abms.clientes.edit')
            ->with('provincias',$provincias)
            ->with('clientes',$clientes);
    }

    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:50',
            'direccion'=>'required|string|max:50',
            'provincia'=>'required|string|max:40',
            'localidad'=>'required|string|max:40',
            'email1'=>'required|string|max:40',
            'telefono'=>'required|string|max:11',
            'contacto'=>'required|string|max:120',
            'clientepallet'=>'required|string',
            'telefono_contacto'=>'required|string|max:120',
            'cuit'=>'required|integer',
            'saldo'=>'required|integer',
            'provincia'=>'required',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosCliente=request()->except('_token');

      
    	$datosCliente=request()->except(['_token','_method']);
        Cliente::where('id','=',$id)->update($datosCliente);
 
        return Redirect('abms/clientes')->with('Mensaje','Cliente Modificado con éxito!!!!!');
    }

     public function destroy($id)
    {
        Cliente::destroy($id);
        return Redirect('abms/clientes')->with('Mensaje','Cliente Eliminado con éxito!!!!!!');
    }
}
