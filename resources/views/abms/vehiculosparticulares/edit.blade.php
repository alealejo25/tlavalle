@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Vehiculos Particulares</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	

			{!!Form::model($vehiculoparticular,['method'=>'PATCH','route'=>['vehiculosparticulares.update',$vehiculoparticular->id]])!!}
            {{Form::token()}}
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('dominio', 'Dominio')}}
				<input type="text" name="dominio" class="form-control" value="{{$vehiculoparticular->dominio}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Modelo</label>
				<input type="text" name="modelo" class="form-control" value="{{$vehiculoparticular->modelo}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Marca</label>
				<input type="text" name="marca" class="form-control" value="{{$vehiculoparticular->marca}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Año</label>
				<input type="text" name="año" class="form-control" value="{{$vehiculoparticular->año}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">KM</label>
				<input type="text" name="km" class="form-control" value="{{$vehiculoparticular->km}}">
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control" value="{{$vehiculoparticular->fecha_ingreso}}">
			</div>
			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control" value="{{$vehiculoparticular->valor}}">
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion</label>
				<input type="text" name="amortizacion" class="form-control" value="{{$vehiculoparticular->amortizacion}}">
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

			<div class="Form-group">
				<br/>
				<a href="/abms/vehiculoparticulares"><button class="btn btn-success">Regresar</button></a>
			</div>

			<!-- <br>
			<a href="/almacen/categoria"><button class="btn btn-success">Volver</button></a> -->

		</div>
	</div>
@endsection