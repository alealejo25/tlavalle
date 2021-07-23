<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentaBancariaPropia;
use Laracasts\Flash\Flash;

class CuentaBancariaPropiaController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
public function index(Request $request)
    {
        $cuentas_bancarias_propias=CuentaBancariaPropia::search($request->name)->orderBy('cbu','asc')->paginate(10);

        return view('abms.cuentasbancariaspropias.index')
        ->with('cuentas_bancarias_propias',$cuentas_bancarias_propias);
    }
     public function create()
    {
        return view('abms.cuentasbancariaspropias.create');
    }
    public function store(Request $request)
    {

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'cbu'=>'required|integer',
            'alias_cbu'=>'required|string|max:40',
            'titular'=>'required|string|max:60',
            'dni'=>'required|integer',
            'identificacion_tributaria'=>'required',
            'tipo'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        /* forma de grabar los datos en una variable */
        $cuentasbancariaspropias=new CuentaBancariaPropia(request()->except('_token'));
        $cuentasbancariaspropias->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('Se a creado la cuenta bancaria para el propia'); 
       return Redirect('abms/cuentasbancariaspropias/')->with('Mensaje','Cuenta Bancaria Proveedor Agregada con éxito');
    }

    public function edit($id)
    {
    $cuentabancariapropia=CuentaBancariaPropia::findOrFail($id);
    return view('abms.cuentasbancariaspropias.edit',compact('cuentabancariapropia'));
    }

    public function update(Request $request, $id)
    {
        $datosCuentaBancariaPropia=request()->except(['_token','_method']);
      

        CuentaBancariaPropia::where('id','=',$id)->update($datosCuentaBancariaPropia);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/cuentasbancariaspropias')->with('Mensaje','Cuenta Bancaria propia Modificada con éxito!!!!!');
    }
    public function destroy($id)
    {
        
        CuentaBancariaPropia::destroy($id);
      flash::success('Cuenta Bancaria propia  Eliminada con éxito!!!!!!'); 
        return Redirect('abms/cuentasbancariaspropias')->with('Mensaje','Cuenta Bancaria propia  Eliminada con éxito!!!!!!');

    }
  

}
