@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Anticipo</h3>

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
			{!!Form::open(['route' => 'guardaranticipo','method'=>'POST'])!!}
			
			{{Form::token()}}
			<div class="Form-group">

				<input type="hidden" name="flete_id" class="form-control {{$errors->has('flete_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('fechainicio','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="chofer_id">Ingrese el importe del Anticipo</label>
				<input type="text" name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" value="{{old('importe')}}"> 
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="chofer_id">Seleccione Fecha del Anticipo</label>
				<input type="date" name="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" value="{{old('fecha')}}"> 
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			
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