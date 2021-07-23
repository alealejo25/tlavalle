@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Vehiculos Particulares</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'abms/vehiculosparticulares','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('dominio', 'Dominio')}}
				<input type="text" class="form-control {{$errors->has('dominio')?'is-invalid':''}}" placeholder="Dominio..." name="dominio" id="dominio"  value="{{old('dominio')}}">
				{!! $errors->first('dominio','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="modelo">Modelo</label>
				<input type="text" name="modelo" class="form-control {{$errors->has('modelo')?'is-invalid':''}}" placeholder="Modelo..." value="{{old('modelo')}}">
				{!! $errors->first('modelo','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="marca">Marca</label>
				<input type="text" name="marca" class="form-control {{$errors->has('marca')?'is-invalid':''}}" placeholder="Marca..." value="{{old('marca')}}">
				{!! $errors->first('marca','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="año">Año</label>
				<input type="text" name="año" class="form-control {{$errors->has('año')?'is-invalid':''}}"  placeholder="Año..." value="{{old('año')}}">
				{!! $errors->first('año','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="km">KM</label>
				<input type="text" name="km" class="form-control {{$errors->has('km')?'is-invalid':''}}"  placeholder="KM..." value="{{old('km')}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control {{$errors->has('fecha_ingreso')?'is-invalid':''}}"  placeholder="Fecha de Ingreso..." value="{{old('fecha_ingreso')}}">
				{!! $errors->first('fecha_ingreso','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control {{$errors->has('valor')?'is-invalid':''}}"  placeholder="Valor..." value="{{old('valor')}}">
				{!! $errors->first('valor','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion Anual</label>
				<input type="text" name="amortizacion" class="form-control {{$errors->has('amortizacion')?'is-invalid':''}}"  placeholder="Amortizacion Anual..." value="{{old('amortizacion')}}">
				{!! $errors->first('amortizacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/vehiculosparticulares"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection