<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
public function index(Request $request)
    {
        $bancos=Banco::search($request->name)->orderBy('denominacion','ASC')->paginate(10);
        return view('abms.bancos.index')
        ->with('bancos',$bancos);
    }



    public function create()
    {
        return view('abms.bancos.create');
    }
    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'denominacion'=>'required|string|max:50',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosBanco=request()->except('_token');
       Banco::insert($datosBanco);
       //return response()->json($datosCamion);
       return Redirect('abms/bancos')->with('Mensaje','Banco Agregado con éxito');
    }

    public function edit($id)
    {
        $bancos=Banco::find($id);
        return view('abms.bancos.edit')
            ->with('bancos',$bancos);
    }

     public function update(Request $request, $id)
    {
        $datosBancos=request()->except(['_token','_method']);
      

        Banco::where('id','=',$id)->update($datosBancos);
        return Redirect('abms/bancos')->with('Mensaje','Banco Modificado con éxito!!!!!');
    }

    public function destroy($id)
        {
            
            Banco::destroy($id);
            return Redirect('abms/bancos')->with('Mensaje','Banco Eliminado con éxito!!!!!!');

            //codigo para eliminar fotos
            // $camion=Camion::findOrFail($id);
            // if (Storage::delete('public/'.$camion->foto)){
            //     Camion::destroy($id);
            // }
            
            // return redirect('/abms/camiones');
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
