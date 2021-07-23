@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Articulos</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($articulos,['method'=>'PATCH','route'=>['articulos.update',$articulos->id]])!!}


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('codigo', 'Codigo')}}
				<input type="text" class="form-control {{$errors->has('codigo')?'is-invalid':''}}" placeholder="Codigo..." name="codigo" id="codigo"  value="{{$articulos->codigo}}" disabled>
				{!! $errors->first('codigo','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" placeholder="Nombre..." value="{{$articulos->nombre}}">
				{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cantidad">Cantidad</label>
				<input type="text" name="cantidad" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" placeholder="Cantidad..." value="{{$articulos->cantidad}}">
				{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="categoria_id">Categoria</label>
				{!!Form::select('categoria_id',$categorias,$articulos->categoria->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('categoria_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cliente_id">Cliente</label>
				{!!Form::select('cliente_id',$clientes,$articulos->cliente->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('cliente_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/articulos"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection