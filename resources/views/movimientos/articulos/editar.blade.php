@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Movimiento Articulo</h3>

				
			
	{!!Form::model($movimientos,['method'=>'PATCH','route'=>['articulos.guardaredicion',$movimientos->id]])!!}


			{{Form::token()}}		
 	
	

		

	
			

			<br>
			

		</div>
	</div> 
@endsection