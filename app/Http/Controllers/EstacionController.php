<?php

namespace App\Http\Controllers;

use App\Estacion;

use Illuminate\Http\Request;

class EstacionController extends Controller
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
        $estaciones=Estacion::search($request->name)->orderBy('nombre','DESC')->paginate(10);
        return view('abms.estaciones.index')
        ->with('estaciones',$estaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abms.estaciones.create');
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
            'nombre'=>'required|string|max:50',
            'direccion'=>'required|string|max:50',
            'telefono'=>'required',
            'contacto'=>'required|string|max:50',
            'telefono_contacto'=>'required',
            'cuit'=>'required|integer',
            'saldo'=>'required|integer'            
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosEstacion=request()->except('_token');
       Estacion::insert($datosEstacion);
       //return response()->json($datosCamion);
       return Redirect('abms/estaciones')->with('Mensaje','Estacion de Servicio agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function show(vr $vr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estaciones=Estacion::find($id);
        return view('abms.estaciones.edit')
            ->with('estaciones',$estaciones);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEstacion=request()->except(['_token','_method']);
      

        Estacion::where('id','=',$id)->update($datosEstacion);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/estaciones')->with('Mensaje','Estacion de Servicio Modificada con éxito!!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function destroy(vr $vr)
    {
        //
    }
}
