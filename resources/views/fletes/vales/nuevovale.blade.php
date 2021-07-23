@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Vale</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			<!-- {!!Form::open(array('url'=>'fletes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}  -->
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->
			{!!Form::open(['route' => 'guardarvale','method'=>'POST'])!!}
			
			{{Form::token()}}
			<div class="Form-group">
				<input type="hidden" name="flete_id" class="form-control {{$errors->has('flete_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('flete_id','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="cantidad">Ingrese la cantidad de litros del Vale</label>
				<input type="text" name="cantidad" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" value="{{old('cantidad')}}"> 
				{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div>
				<label for="estacion_id">Seleccione Estacion</label>
				{!!Form::select('estacion_id',$estaciones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>

			<div class="Form-group">
				<label for="nroremitoestacion">Numero de Remito de Estacion</label>
				<input type="text" name="nroremitoestacion" class="form-control {{$errors->has('nroremitoestacion')?'is-invalid':''}}" value="{{old('nroremitoestacion')}}"> 
				{!! $errors->first('nroremitoestacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div>
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/fletes"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection