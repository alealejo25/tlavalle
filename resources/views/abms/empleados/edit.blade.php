@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Empleados</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
 			{!!Form::model($datos,['method'=>'PATCH','route'=>['empleados.update',$datos->id],'enctype'=>'multipart/form-data'])!!}
			{{Form::token()}}
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nombre', 'Nombre')}}
				<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" placeholder="Nombre..." name="nombre" id="nombre"  value="{{$datos->nombre}}">
				{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" id="apellido" class="form-control {{$errors->has('apellido')?'is-invalid':''}}" placeholder="Apellido..." value="{{$datos->apellido}}">
				{!! $errors->first('apellido','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="dni">DNI</label>
				<input type="text" name="dni" id="dni" class="form-control {{$errors->has('dni')?'is-invalid':''}}" placeholder="DNI..." value="{{$datos->dni}}">
				{!! $errors->first('dni','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" class="form-control {{$errors->has('direccion')?'is-invalid':''}}"  placeholder="Dirección..." value="{{$datos->direccion}}">
				{!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fechanac">Fecha de Nac.</label>
				<input type="date" name="fechanac" id="fechanac" class="form-control {{$errors->has('fechanac')?'is-invalid':''}}" placeholder="Fecha de Nacimiento..." value="{{$datos->fechanac}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="nrocelular">Nro. Telefono</label>
				<input type="text" name="nrocelular" id="nrocelular" class="form-control {{$errors->has('nrocelular')?'is-invalid':''}}" placeholder="Numero de Telefono..." value="{{$datos->nrocelular}}">
				{!! $errors->first('nrocelular','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="sueldoanterior">Saldo Anterior</label>
				<input type="text" name="sueldoanterior" id="sueldoanterior" class="form-control" placeholder="Saldo Anterior..." value="{{$datos->sueldoanterior}}" >
				{!! $errors->first('sueldoanterior','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="sueldoactual">Sueldo Actual</label>
				<input type="text" name="sueldoactual" id="sueldoactual" class="form-control" placeholder="Sueldo Actual..." value="{{$datos->sueldoactual}}">
				{!! $errors->first('sueldoactual','<div class="invalid-feedback">:message</div>')!!}
			</div>
						<div class="Form-group">
				<label for="saldo">Saldo</label>
				<input type="text" name="saldo" id="saldo" class="form-control" placeholder="Saldo..." value="{{$datos->saldo}}" >
				{!! $errors->first('saldo','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="area">Area</label>
				<input type="text" name="area" id="area" class="form-control {{$errors->has('area')?'is-invalid':''}}"  placeholder="Area..." value="{{$datos->area}}">
				{!! $errors->first('area','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="foto">Foto</label>
				<img src="{{asset('img/'. $datos->foto)}}" height="150" width="150">
				<input type="file" name="foto" id="foto" class="form-control">
				{!! $errors->first('foto','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>


			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/empleados"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection