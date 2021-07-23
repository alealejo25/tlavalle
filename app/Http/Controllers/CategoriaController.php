<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $categorias=Categoria::search($request->name)->orderBy('nombre','ASC')->paginate(10);
        return view('abms.categorias.index')
        ->with('categorias',$categorias);

    }

     public function create()
    {
        return view('abms.categorias.create');
    }

     public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'nombre'=>'required|string|max:50'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosCategoria=request()->except('_token');
       Categoria::insert($datosCategoria);
       //return response()->json($datosCamion);
       return Redirect('abms/categorias')->with('Mensaje','Categoria Agregada con éxito');
    }

     public function update(Request $request, $id)
    {
        $datosCategorias=request()->except(['_token','_method']);
      

        Categoria::where('id','=',$id)->update($datosCategorias);
       return Redirect('abms/categorias')->with('Mensaje','Categoria Modificada con éxito!!!!!');
    }

    public function edit($id)
    {
        $categorias=Categoria::find($id);
        return view('abms.categorias.edit')
            ->with('categorias',$categorias);
    }
     public function destroy($id)
        {
            Categoria::destroy($id);
            return Redirect('abms/categorias')->with('Mensaje','Categoria Eliminada con éxito!!!!!!');
        }


}
