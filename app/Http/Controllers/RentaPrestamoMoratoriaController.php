<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentaPrestamoMoratoria;
use Laracasts\Flash\Flash;

class RentaPrestamoMoratoriaController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $datos['rentas_prestamos_moratorias']=RentaPrestamoMoratoria::search($request->name)->orderBy('id','asc')->paginate(10);
        return view('abms.rentasprestamosmoratorias.index',$datos);
    }
    public function create()
    {
        return view('abms.rentasprestamosmoratorias.create');
    }

    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'tipo'=>'required',
            'tipo_plan'=>'required',
            'descripcion'=>'required',
            'monto_declarado'=>'required',
            'cant_cuotas'=>'required|string|max:4',
            'fecha_primera_cuota'=>'required',
            'fecha_ultima_cuota'=>'required',
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

       $datosRentaPrestamoMoratoria=request()->except('_token');
       RentaPrestamoMoratoria::insert($datosRentaPrestamoMoratoria);
       Flash::success('Moratoria/Plan de Pago Agregado Correctamente');
       return Redirect('abms/rentasprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Agregado con éxito');
    }

    public function edit($id)
    {
    $rentaprestamomoratoria=RentaPrestamoMoratoria::findOrFail($id);
    return view('abms.rentasprestamosmoratorias.edit',compact('rentaprestamomoratoria'));
    }

    public function update(Request $request, $id)
    {
        $datosRentaPrestamoMoratoria=request()->except(['_token','_method']);
      

        RentaPrestamoMoratoria::where('id','=',$id)->update($datosRentaPrestamoMoratoria);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/rentasprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Modificado con éxito!!!!!');
    }
     public function destroy($id)
    {
        
        RentaPrestamoMoratoria::destroy($id);
        Flash::success('Moratoria/Plan de Pago Eliminado con éxito!!!!!!');
        return Redirect('abms/rentasprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Eliminado con éxito!!!!!!');

	}
}
