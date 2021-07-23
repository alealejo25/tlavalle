@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Movimiento de Articulo</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($movimientosarticulos,['method'=>'PATCH','route'=>['guardareditardetalle',$movimientosarticulos->id]])!!}


			{{Form::token()}}
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/movimientos/edicionmovimientoarticulo"><button class="btn btn-success">Regresar</button></a>
			</div>
		</div>
	</div> 
@endsection