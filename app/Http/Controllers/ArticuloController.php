<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use App\Cliente;
use Laracasts\Flash\Flash;

class ArticuloController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $articulos=Articulo::search($request->name)->orderBy('nombre','ASC')->paginate(10);

        //esto es para las relacion de la tabla articulos con categorias
        $articulos->each(function($articulos){
        	$articulos->categoria;
        });
		//----------------------------------------------------------

        return view('abms.articulos.index')
        	->with('articulos',$articulos);

    }
    public function create()
    {
    	$categorias=Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
   	    $clientes=Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('abms.articulos.create')
                ->with('clientes',$clientes)
        		->with('categorias',$categorias);
    }
     public function store(Request $request)
    {

        /*VALIDACION -----------------------------------------*/
        $campos=[
            'codigo'=>'required|string',
            'nombre'=>'required|string|max:40',
            'cantidad'=>'required|integer',
            'categoria_id'=>'required',
            'cliente_id'=>'required'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

        /* forma de grabar los datos en una variable */
        $datosArticulo=new Articulo(request()->except('_token'));
        $datosArticulo->save();
        /*-------------------------------------------------------*/
       /* otra forma de guardar los datos tambien funciona*/
       /*$datosAcoplado=request()->except('_token');*/
       /*Acoplado::insert($datosAcoplado);*/
       /*-----------------------------------------------------------*/
       //return response()->json($datosCamion);

       flash::success('se a creado el Articulo'); 
       return Redirect('abms/articulos/')->with('Mensaje','Articulo Agregado con éxito');
    }

    public function edit($id)
    {
        $articulos=Articulo::find($id);

        $categorias= Categoria::orderBy('id','DESC')->pluck('nombre','id');
        $clientes= Cliente::orderBy('id','DESC')->pluck('nombre','id');
        return view('abms.articulos.edit')
            ->with('categorias',$categorias)
            ->with('clientes',$clientes)
            ->with('articulos',$articulos);
           
    }
     public function update(Request $request, $id)
    {
        $datosArticulo=request()->except(['_token','_method']);
      

        Articulo::where('id','=',$id)->update($datosArticulo);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/articulos')->with('Mensaje','Articulo Modificado con éxito!!!!!');
    }
    public function destroy($id)
    {
        
        Articulo::destroy($id);
        //return redirect('/abms/camiones');
        return Redirect('abms/articulos')->with('Mensaje','Articulo Eliminado con éxito!!!!!!');
    }

    public function listarPdf(){
        $articulos=Articulo::orderBy('nombre','ASC')->get();
        $cont=Articulo::count();

        //esto es para las relacion de la tabla articulos con categorias
        $articulos->each(function($articulos){
            $articulos->categoria;
        });

        $pdf=\PDF::loadView('pdf.articulospdf',['articulos'=>$articulos,'cont'=>$cont]);
        return $pdf->download('articulos.pdf');

    }
}
