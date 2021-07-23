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
{    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
    {

        $articulos=Articulo::orderBy('nombre', 'ASC')->get();
        $clientes=Cliente::orderBy('nombre', 'ASC')->get();
        $choferes=Chofer::orderBy('nombre', 'ASC')->get();
        return view("movimientos.articulos.index",compact("articulos","clientes","choferes"));
    }


    public function store(Request $request)
    {

    	$date = new \DateTime();
    
 		$campos=[
            'nro_comprobante'=>'required|string|max:60'
             
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



    	$datos=$request->all();
    	// dd($datos['articulo_id']);
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
	    			"fecha"=>$date,
	    			"cantidad"=>$datos["cantidad"][$key]
	    		]);
	    		$art=Articulo::find($value);

	    		if($datos["tipo"]==='Ingreso'){
	    			$art->update(["cantidad"=>$art->cantidad+$datos["cantidad"][$key]]);
	    		}
	    		if($datos["tipo"]==='Egreso'){
	    			$art->update(["cantidad"=>$art->cantidad-$datos["cantidad"][$key]]);
	    		}

	    	}



	        DB::commit();
	        return redirect ("/movimientos/articulos/listar")->with('status','1');
	    } catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect ("/movimientos/articulos/listar")->with('status',$Mensaje);
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
	public function detalle($id){
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


		 return view('movimientos.articulos.detalle')
            ->with('movimientos',$movimientos)
            ->with('consulta',$consulta);

    	}


	public function editar($id){
        $movimientos=Movimiento::find($id);



		 return view('movimientos.articulos.editar')
            ->with('movimientos',$movimientos);
    	}

     public function update(Request $request, $id)
    {
       dd($request);
    }


}


