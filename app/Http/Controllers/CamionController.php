<?php

namespace App\Http\Controllers;


use App\Camion;
//use App\Http\Controllers\Redirect; // agregadas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;




class CamionController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $camiones=Camion::search($request->name)->orderBy('dominio','ASC')->paginate(10);

        return view('abms.camiones.index')
            ->with('camiones',$camiones);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abms.camiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'dominio'=>'required|string|max:8',
            'modelo'=>'required|string|max:30',
            'marca'=>'required|string|max:30',
            'año'=>'required|string|max:4',
            'km'=>'required|string|max:7',
            'proximoservicecaja'=>'required',
            'proximoservicediferencial'=>'required',
            'proximoservicemotor'=>'required'

            
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        /*--------------------------------------------------------*/

       $datosCamion=request()->except('_token');
       if($request->hasFile('foto')){
            $datosCamion['foto']=$request->file('foto')->store('uploads','public');
        }
       Camion::insert($datosCamion);
       //return response()->json($datosCamion);
       return Redirect('abms/camiones')->with('Mensaje','Camion Agregado con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function show(Camion $camion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $camion=Camion::findOrFail($id);
    return view('abms.camiones.edit',compact('camion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCamion=request()->except(['_token','_method']);
      

        Camion::where('id','=',$id)->update($datosCamion);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/camiones')->with('Mensaje','Camion Modificado con éxito!!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Camion::destroy($id);
        //return redirect('/abms/camiones');
        return Redirect('abms/camiones')->with('Mensaje','Camion Eliminado con éxito!!!!!!');

        //codigo para eliminar fotos
        // $camion=Camion::findOrFail($id);
        // if (Storage::delete('public/'.$camion->foto)){
        //     Camion::destroy($id);
        // }
        
        // return redirect('/abms/camiones');
    }

        public function listarPdf(){
        $camiones=Camion::orderBy('dominio','ASC')->get();
        $cont=Camion::count();

  
        $pdf=\PDF::loadView('pdf.camionespdf',['camiones'=>$camiones,'cont'=>$cont]);
        return $pdf->download('camiones.pdf');

    }
}
