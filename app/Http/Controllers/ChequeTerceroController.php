<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Proveedor;
use App\Banco;
use App\ChequeTercero;

class ChequeTerceroController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {
        $chequesterceros=ChequeTercero::orderBy('numero','DESC')->paginate(20);
        $chequesterceros->each(function($chequesterceros){
/*          $chequesterceros->cliente;
            $chequesterceros->banco;
            $chequesterceros->proveedor;
*/
        });
        
        return view('finanzas.chequesterceros.index')
        ->with('chequesterceros',$chequesterceros);
    }
    public function create()
    {
        $clientes=Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        $proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
        $bancos=Banco::orderBy('denominacion','ASC')->pluck('denominacion','id');
        return view('finanzas.chequesterceros.create')
        ->with('clientes',$clientes)
        ->with('proveedores',$proveedores)
        ->with('bancos',$bancos);
    }
     public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'numero'=>'required|string|max:30',
            'importe'=>'required|integer',
            'fecha'=>'required',
            'cliente_id'=>'required',
            'banco_id'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosChequesTerceros=new ChequeTercero(request()->except('_token'));

       $datosChequesTerceros->estado='DISPONIBLE';
       //$datosChequesTerceros->proveedor_id=99999;
       $datosChequesTerceros->save();
       

       //return response()->json($datosCamion);
       return Redirect('finanzas/chequesterceros')->with('Mensaje','Cheque de Tercero Ingresado!!!!!');
    }
       public function edit($id)
    {
        $chequesterceros=ChequeTercero::find($id);
        $clientes=Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        $proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
        $bancos=Banco::orderBy('denominacion','ASC')->pluck('denominacion','id');
        return view('finanzas.chequesterceros.edit')
            	->with('clientes',$clientes)
            	->with('proveedores',$proveedores)
        		->with('bancos',$bancos)
            	->with('chequesterceros',$chequesterceros);
    }
    public function update(Request $request, $id)
    {
        $datosChequesTerceros=request()->except(['_token','_method']);
        ChequeTercero::where('id','=',$id)->update($datosChequesTerceros);
        return Redirect('finanzas/chequesterceros')->with('Mensaje','Cheque de tercero Modificado con éxito!!!!!');
    }
}
