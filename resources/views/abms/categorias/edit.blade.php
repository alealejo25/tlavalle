@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Categoria</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	

			{!!Form::model($categorias,['method'=>'PATCH','route'=>['categorias.update',$categorias->id]])!!}
            {{Form::token()}}
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nombre', 'Nombre')}}
				<input type="text" name="nombre" class="form-control" value="{{$categorias->nombre}}">
			</div>
			

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

			<div class="Form-group">
				<br/>
				<a href="/abms/categorias"><button class="btn btn-success">Regresar</button></a>
			</div>

			<!-- <br>
			<a href="/almacen/categoria"><button class="btn btn-success">Volver</button></a> -->

		</div>
	</div>
@endsection