<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehiculoParticular;
use Laracasts\Flash\Flash;

class VehiculoParticularController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {

        $vehiculos_particulares=VehiculoParticular::search($request->name)->orderBy('dominio','asc')->paginate(10);

        return view('abms.vehiculosparticulares.index')
        ->with('vehiculos_particulares',$vehiculos_particulares);
    }
    public function create()
    {
        return view('abms.vehiculosparticulares.create');
    }
    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'dominio'=>'required|string|max:8',
            'modelo'=>'required|string|max:30',
            'marca'=>'required|string|max:30',
            'año'=>'required|string|max:4',
            'km'=>'required|string|max:7',
            'fecha_ingreso'=>'required',
            'amortizacion'=>'required|integer',
            'valor'=>'required',
            
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

       $datosVehiculoParticular=request()->except('_token');
       VehiculoParticular::insert($datosVehiculoParticular);
       	Flash::success('Vehiculo Particular Agregado Correctamente');
       return Redirect('abms/vehiculosparticulares')->with('Mensaje','Vehiculo Particular Agregado con éxito');
    }
    public function edit($id)
    {
    $vehiculoparticular=VehiculoParticular::findOrFail($id);
    return view('abms.vehiculosparticulares.edit',compact('vehiculoparticular'));
    }

    public function update(Request $request, $id)
    {
        $datosVehiculoParticular=request()->except(['_token','_method']);
      

        VehiculoParticular::where('id','=',$id)->update($datosVehiculoParticular);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/vehiculosparticulares')->with('Mensaje','Vehiculo Particular Modificado con éxito!!!!!');
    }
    public function destroy($id)
    {
        
        VehiculoParticular::destroy($id);
        //return redirect('/abms/camiones');
        return Redirect('abms/vehiculosparticulares')->with('Mensaje','Vehiculo Particular Eliminado con éxito!!!!!!');

        //codigo para eliminar fotos
        // $camion=Camion::findOrFail($id);
        // if (Storage::delete('public/'.$camion->foto)){
        //     Camion::destroy($id);
        // }
        
        // return redirect('/abms/camiones');
    }

}
