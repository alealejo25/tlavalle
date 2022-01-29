@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Ingresos Brutos</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'abms/ingresosbrutos','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
			{{Form::token()}}
			
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('provincia', 'Provincia')}}
				<input type="text" class="form-control {{$errors->has('provincia')?'is-invalid':''}}" placeholder="Provincia..." name="provincia" id="provincia"  value="{{old('provincia')}}">
				{!! $errors->first('provincia','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('impuesto', 'Impuesto')}}
				<input type="text" class="form-control {{$errors->has('impuesto')?'is-invalid':''}}" placeholder="Impuesto..." name="impuesto" id="impuesto"  value="{{old('impuesto')}}">
				{!! $errors->first('impuesto','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/ingresosbrutos"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection