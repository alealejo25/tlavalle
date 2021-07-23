<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentaBancariaProveedor;
use App\Proveedor;
use Laracasts\Flash\Flash;

class CuentaBancariaProveedorController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
public function index(Request $request)
    {
        $cuentasbancariasproveedores=CuentaBancariaProveedor::search($request->name)->orderBy('id','DESC')->paginate(10);

        //esto es para las relacion de la tabla articulos con categorias
        $cuentasbancariasproveedores->each(function($cuentasbancariasproveedores){
        	$cuentasbancariasproveedores->proveedor;
        });
		//----------------------------------------------------------
        //dd($acoplados);
        return view('abms.cuentasbancariasproveedores.index')
        	->with('cuentasbancariasproveedores',$cuentasbancariasproveedores);

    }
    public function create()
    {
        $proveedores=Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
    
        return view('abms.cuentasbancariasproveedores.create')
                ->with('proveedores',$proveedores);
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
            'proveedor_id'=>'required'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        /* forma de grabar los datos en una variable */
        $cuentasbancariasproveedores=new CuentaBancariaProveedor(request()->except('_token'));
        $cuentasbancariasproveedores->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('se a creado la cuenta bancaria para el proveedor'); 
       return Redirect('abms/cuentasbancariasproveedores/')->with('Mensaje','Cuenta Bancaria Proveedor Agregada con éxito');
    }
    public function destroy($id)
    {
        
        CuentaBancariaProveedor::destroy($id);
        //return redirect('/abms/camiones');
        return Redirect('abms/cuentasbancariasproveedores')->with('Mensaje','Cuenta Bancaria Proveedor Eliminada con éxito!!!!!!');

        //codigo para eliminar fotos
        // $camion=Camion::findOrFail($id);
        // if (Storage::delete('public/'.$camion->foto)){
        //     Camion::destroy($id);
        // }
        
        // return redirect('/abms/camiones');
    }
    public function edit($id)
    {
        $cuentasbancariasproveedores=CuentaBancariaProveedor::find($id);
        $proveedores= Proveedor::orderBy('id','DESC')->pluck('nombre','id');
        return view('abms.cuentasbancariasproveedores.edit')
            ->with('cuentasbancariasproveedores',$cuentasbancariasproveedores)
            ->with('proveedores',$proveedores);
          
    }
     public function update(Request $request, $id)
    {
        $datosCuentasBancariasProveedores=request()->except(['_token','_method']);
      

        CuentaBancariaProveedor::where('id','=',$id)->update($datosCuentasBancariasProveedores);
        return Redirect('abms/cuentasbancariasproveedores')->with('Mensaje','Cuenta Bancaria Proveedor Modificada con éxito!!!!!');
    }
    
    

}

