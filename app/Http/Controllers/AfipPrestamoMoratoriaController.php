<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AfipPrestamoMoratoria;
use Laracasts\Flash\Flash;

class AfipPrestamoMoratoriaController extends Controller
{
	public function index(Request $request)
    {
        $datos['afip_prestamos_moratorias']=AfipPrestamoMoratoria::orderBy('id','asc')->paginate(10);
        return view('abms.afipprestamosmoratorias.index',$datos);
    }
    public function create()
    {
        return view('abms.afipprestamosmoratorias.create');
    }

    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'tipo'=>'required',
            'impuesto'=>'required|string|max:35',
            'monto_declarado'=>'required',
            'cant_cuotas'=>'required|string|max:4',
            'fecha_primera_cuota'=>'required',
            'fecha_ultima_cuota'=>'required',
         ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

       $datosAfipPrestamoMoratoria=request()->except('_token');
       AfipPrestamoMoratoria::insert($datosAfipPrestamoMoratoria);
       	Flash::success('Moratoria/Plan de Pago Agregado Correctamente');
       return Redirect('abms/afipprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Agregado con éxito');
    }

    public function edit($id)
    {
    $afipprestamomoratoria=AfipPrestamoMoratoria::findOrFail($id);
    return view('abms.afipprestamosmoratorias.edit',compact('afipprestamomoratoria'));
    }

    public function update(Request $request, $id)
    {
        $datosAfipPrestamoMoratoria=request()->except(['_token','_method']);
      

        AfipPrestamoMoratoria::where('id','=',$id)->update($datosAfipPrestamoMoratoria);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/afipprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Modificado con éxito!!!!!');
    }
        public function destroy($id)
    {
        
        AfipPrestamoMoratoria::destroy($id);
        Flash::success('Moratoria/Plan de Pago Eliminado con éxito!!!!!!');
        return Redirect('abms/afipprestamosmoratorias')->with('Mensaje','Moratoria/Plan de Pago Eliminado con éxito!!!!!!');

	}
}
