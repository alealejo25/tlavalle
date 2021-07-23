<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChequePropio;
use App\Banco;
use App\Proveedor;
use App\CuentaBancariaPropia;
use Laracasts\Flash\Flash;

class ChequePropioController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $bancos=Banco::orderBy('denominacion','DESC')->pluck('denominacion','id');
        $proveedores=Proveedor::orderBy('nombre','DESC')->pluck('nombre','id');
        $cuentasbancariaspropias=CuentaBancariaPropia::orderBy('cbu','DESC')->pluck('cbu','id');
        return view('finanzas.chequespropios.index')
        ->with('bancos',$bancos)
        ->with('proveedores',$proveedores)
        ->with('cuentasbancariaspropias',$cuentasbancariaspropias);

    }

    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'descripcion'=>'required|string|max:60',
            'cantchueques'=>'required|integer',
            'cuenta_bancaria_propia_id'=>'required',
            'banco_id'=>'required',
            'fecha'=>'required'
        ];

        $Mensaje=["required"=>'El :attribute es requerido'];
        $numerocheque=$request->numero;
        $cantidadcheques=$request->cantchueques;


        $this->validate($request,$campos,$Mensaje);
 
        for ($i = 0; $i < $cantidadcheques; $i++){
            $datosChequesPropios=new ChequePropio(request()->except('_token'));
            $datosChequesPropios->estado='DISPONIBLE';
            $datosChequesPropios->numero=$numerocheque;
            $numerocheque++;
            $datosChequesPropios->save();
        }
       

        Flash::success('Cheques propios agregados con exito!!!!!!');
       //return response()->json($datosCamion);
       return Redirect('finanzas/chequespropios')->with('Mensaje','Cheque de Tercero Ingresado!!!!!');
    }

}
