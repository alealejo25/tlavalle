<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BienDeUso;
use Laracasts\Flash\Flash;

class BienDeUsoController extends Controller
{
	public function index(Request $request)
    {

        $datos['bienes_de_uso']=BienDeUso::orderBy('descripcion','asc')->paginate(10);

        return view('abms.bienesdeuso.index',$datos);
    }

    public function create()
    {
        return view('abms.bienesdeuso.create');
    }

    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'codigo'=>'required|string|max:20',
            'descripcion'=>'required|string|max:60',
            'fecha_ingreso'=>'required',
            'amortizacion'=>'required|integer',
            'valor'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

       $datosBienDeUso=request()->except('_token');
       BienDeUso::insert($datosBienDeUso);
       Flash::success('Bien de Uso Agregado Correctamente');
       return Redirect('abms/bienesdeuso')->with('Mensaje','Vehiculo Particular Agregado con éxito');
    }
    public function edit($id)
    {
    $biendeuso=BienDeUso::findOrFail($id);
    return view('abms.bienesdeuso.edit',compact('biendeuso'));
    }

    public function update(Request $request, $id)
    {
        $datosBienDeUso=request()->except(['_token','_method']);
        BienDeUso::where('id','=',$id)->update($datosBienDeUso);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/bienesdeuso')->with('Mensaje','Bienes de Uso Modificado con éxito!!!!!');
    }
    public function destroy($id)
    {
        BienDeUso::destroy($id);
        return Redirect('abms/bienesdeuso')->with('Mensaje','Bien de Uso Eliminado con éxito!!!!!!');
    }
}
