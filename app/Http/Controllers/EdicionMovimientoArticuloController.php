<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Acoplado;
use App\Camion;
use App\Http\Requests\CategoriaFormRequest;
use App\Movimiento;
use App\Movimiento_Articulo;
use App\Cliente;
use App\Chofer;
use App\Articulo;


use Laracasts\Flash\Flash;

use DB;

use Barryvdh\DomPDF\Facade as PDF;

class EdicionMovimientoArticuloController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {

    	 $movimientos=Movimiento::orderBy('fecha','DESC')->paginate(10);
		 $movimientos->each(function($movimientos){
            $movimientos->chofer;
            $movimientos->cliente;
        });
		return view('movimientos.edicionmovimientoarticulo.index')
        	->with('movimientos',$movimientos);
    }

    public function edit($id)
    {

        $movimientos=Movimiento::find($id);
        $choferes= Chofer::orderBy('id','DESC')->pluck('nombre','id');
        $clientes= Cliente::orderBy('id','DESC')->pluck('nombre','id');
        return view('movimientos.edicionmovimientoarticulo.edit')
          	->with('movimientos',$movimientos)
            ->with('choferes',$choferes)
            ->with('clientes',$clientes);
           
    }

     public function update(Request $request, $id)
    {
  		$datosmovimiento=request()->except(['_token','_method']);
      

        Movimiento::where('id','=',$id)->update($datosmovimiento);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('movimientos/edicionmovimientoarticulo')->with('Mensaje','Movimiento del Articulo Modificado con éxito!!!!!');
     }
    public function detalle( $id)
    {
		$movimientos=Movimiento::where('id',$id)->get();
		$movimientos->each(function($movimientos){
            $movimientos->chofer;
            $movimientos->cliente;
        });
		$consulta=Movimiento_Articulo::where('movimiento_id',$id)->get();
 		$consulta->each(function($consulta){
            $consulta->articulo;
            $consulta->articulo->categoria;
 
        });


		 return view('movimientos.edicionmovimientoarticulo.detallearticulo')
            ->with('movimientos',$movimientos)
            ->with('consulta',$consulta);
     }

     public function editardetalle( $id)
    {
		$movimientosarticulos=Movimiento_Articulo::find($id);
        $articulos= Articulo::orderBy('id','DESC')->pluck('nombre','id');

        return view('movimientos.edicionmovimientoarticulo.editardetalle')
          	->with('movimientosarticulos',$movimientosarticulos)
            ->with('articulos',$articulos);
     }

     public function guardareditardetalle( $id)
    {
dd($id);
     }


}
