@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Camion</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	

			{!!Form::model($camion,['method'=>'PATCH','route'=>['camiones.update',$camion->id]])!!}
            {{Form::token()}}
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nro_unidad', 'Numero de Unidad')}}
				<input type="text" name="nro_unidad" class="form-control" value="{{$camion->nro_unidad}}">
			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('dominio', 'Dominio')}}
				<input type="text" name="dominio" class="form-control" value="{{$camion->dominio}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Modelo</label>
				<input type="text" name="modelo" class="form-control" value="{{$camion->modelo}}">
			</div>
			<div class="Form-group">
				<label for="marca">Marca</label>
				<input type="text" name="marca" class="form-control" value="{{$camion->marca}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Año</label>
				<input type="text" name="año" class="form-control" value="{{$camion->año}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">KM</label>
				<input type="text" name="km" class="form-control" value="{{$camion->km}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Ult. Service</label>
				<input type="text" name="ultimoservice" class="form-control" value="{{$camion->ultimoservice}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Prox. Service Caja</label>
				<input type="text" name="proximoservicecaja" class="form-control" value="{{$camion->proximoservicecaja}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Prox. Service Diferencial</label>
				<input type="text" name="proximoservicediferencial" class="form-control" value="{{$camion->proximoservicediferencial}}">
			</div>
			<div class="Form-group">
				<label for="proximoservicemotor">Prox. Service Motor</label>
				<input type="text" name="proximoservicemotor" class="form-control" value="{{$camion->proximoservicemotor}}">
			</div>

			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control" value="{{$camion->fecha_ingreso}}">
			</div>
			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control" value="{{$camion->valor}}">
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion</label>
				<input type="text" name="amortizacion" class="form-control" value="{{$camion->amortizacion}}">
			</div>
		 	<div class="Form-group">
				<label for="foto">Foto</label>
				<br/>
				<img src="{{ asset('storage').'/'.$camion->foto}}" alt="" width="50">
				<br/>
				<input type="file" name="foto" id="foto" class="form-control" value="{{$camion->foto}}">
			</div> 

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

			<div class="Form-group">
				<br/>
				<a href="/abms/camiones"><button class="btn btn-success">Regresar</button></a>
			</div>

			<!-- <br>
			<a href="/almacen/categoria"><button class="btn btn-success">Volver</button></a> -->

		</div>
	</div>
@endsection