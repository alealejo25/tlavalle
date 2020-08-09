<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento_Articulo;
use App\Cliente;
use App\Chofer;
use App\Articulo;
use App\Movimiento;
use DB;

class MovimientoArticuloController extends Controller
{
	public function index()
    {

        $articulos=Articulo::orderBy('nombre', 'ASC')->get();
        $clientes=Cliente::orderBy('nombre', 'ASC')->get();
        $choferes=Chofer::orderBy('nombre', 'ASC')->get();
        return view("movimientos.articulos.index",compact("articulos","clientes","choferes"));
    }


    public function store(Request $request)
    {
    	$datos=$request->all();
    	//dd($datos['articulo_id']);
    	try{//esto es para que si hay un error en un insert en una table no grabe en la otra
			DB::beginTransaction();    		
	    	$movimiento=Movimiento::create([
	    		"nro_comprobante"=>$datos["nro_comprobante"],
	    		"tipo"=>$datos["nro_comprobante"],
	    		"cliente_id"=>$datos["cliente_id"],
	    		"chofer_id"=>$datos["chofer_id"],
	    		"receptor_mercaderia"=>$datos["receptor_mercaderia"],
	    		"fecha"=>$datos["fecha"],
	    		"tipo"=>$datos["tipo"]
	        ]);

	    	foreach($datos['articulo_id'] as $key => $value){
	    		Movimiento_Articulo::create([
	    			"movimiento_id"=>$movimiento->id,
	    			"articulo_id"=>$datos["articulo_id"][$key],
	    			"cantidad"=>$datos["cantidad"][$key]
	    		]);
	    		$art=Articulo::find($value);
	    		$art->update(["cantidad"=>$art->cantidad+$datos["cantidad"][$key]]);
	    	}



	        DB::commit();
	        return redirect ("/movimientos/listar")->with('status','1');
	    } catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect ("/movimientos/listar")->with('status','$e->getMessage()');
	    }

       return Redirect('movimientos/articulos/')->with('Mensaje','Chofer Agregado con éxito');
    }
    public function show(Request $request){
    	
    	$id=$request->input("id");
    	$articulos=[];
    	if($id!=null){
    		$articulos=Articulo::select("articulos.*","movimientos_articulos.cantidad as cantidadmov")
    		->join("movimientos_articulos","articulos.id","=","movimientos_articulos.articulo_id")
    		->where("movimientos_articulos.movimiento_id",$id)
    		->get();
    	}

	    $movimientos= Movimiento::select("movimientos.*","clientes.nombre as clientes")
	    ->join("clientes","clientes.id","=","movimientos.cliente_id")
	    ->orderBy("movimientos.id","ASC")
	    ->get();

	    return view("movimientos.articulos.listar",compact("movimientos","articulos"));
	}
}


