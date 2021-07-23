<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $proveedores=Proveedor::search($request->name)->orderBy('nombre','ASC')->paginate(10);
        return view('abms.proveedores.index')
        ->with('proveedores',$proveedores);
    }
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abms.proveedores.create');
    }
    public function store(Request $request)
    {
        /*VALIDACION -----------------------------------------*/
        $campos=[
            'nombre'=>'required|string|max:50',
            'direccion'=>'required|string|max:50',
            'telefono'=>'required|integer|max:11',
            'email1'=>'required',
            'contacto'=>'required|string|max:50',
            'telefono_contacto'=>'required|integer|max:11',
            'cuit'=>'required|integer'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       $datosProveedor=request()->except('_token');
       Proveedor::insert($datosProveedor);
       //return response()->json($datosCamion);
       return Redirect('abms/proveedores')->with('Mensaje','Proveedor agregado con éxito');
    }

    public function edit($id)
    {
        $proveedores=Proveedor::find($id);
        return view('abms.proveedores.edit')
            ->with('proveedores',$proveedores);
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


         $campos=[
            'nombre'=>'required|string|max:50',
            'direccion'=>'required|string|max:50',
            'telefono'=>'required',
            'email1'=>'required',
            'contacto'=>'required|string|max:50',
            'telefono_contacto'=>'required',
            'cuit'=>'required|integer',
            'saldo'=>'required',
            'email1'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosProveedor=request()->except(['_token','_method']);
      

        Proveedor::where('id','=',$id)->update($datosProveedor);
       // $camion=Camion::findOrFail($id);
       // return view('abms.camiones.edit',compact('camion'));
        return Redirect('abms/proveedores')->with('Mensaje','Proveedor Modificado con éxito!!!!!');
    }
     public function destroy($id)
        {
            
            Proveedor::destroy($id);
            return Redirect('abms/proveedores')->with('Mensaje','Proveedor Eliminado con éxito!!!!!!');

            //codigo para eliminar fotos
            // $camion=Camion::findOrFail($id);
            // if (Storage::delete('public/'.$camion->foto)){
            //     Camion::destroy($id);
            // }
            
            // return redirect('/abms/camiones');
        }
}
