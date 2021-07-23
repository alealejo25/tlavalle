@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Acoplado</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($acoplados,['method'=>'PATCH','route'=>['acoplados.update',$acoplados->id]])!!}


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('dominio', 'Dominio')}}
				<input type="text" class="form-control {{$errors->has('dominio')?'is-invalid':''}}" placeholder="Dominio..." name="dominio" id="dominio"  value="{{$acoplados->dominio}}">
				{!! $errors->first('dominio','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="modelo">Modelo</label>
				<input type="text" name="modelo" class="form-control {{$errors->has('modelo')?'is-invalid':''}}" placeholder="Modelo..." value="{{$acoplados->modelo}}">
				{!! $errors->first('modelo','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="marca">Marca</label>
				<input type="text" name="marca" class="form-control {{$errors->has('marca')?'is-invalid':''}}" placeholder="Marca..." value="{{$acoplados->marca}}">
				{!! $errors->first('marca','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="año">Año</label>
				<input type="text" name="año" class="form-control {{$errors->has('año')?'is-invalid':''}}"  placeholder="Año..." value="{{$acoplados->año}}">
				{!! $errors->first('año','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control" value="{{$acoplados->fecha_ingreso}}">
			</div>
			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="number" step=0.01 name="valor" class="form-control" value="{{$acoplados->valor}}">
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion</label>
				<input type="text" name="amortizacion" class="form-control" value="{{$acoplados->amortizacion}}">
			</div>

			<div class="Form-group">
				<label for="camion_id">Dominio Camion</label>
					
				@if($acoplados->id_camion===NULL)
					{!!Form::select('camion_id',$camiones,null,['class' => 'form-control','placeholder'=>'Sin asociar camion','requerid' ])!!}
				@else
					{!!Form::select('camion_id',$camiones,$acoplados->camion->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
				@endif
				{!! $errors->first('camion_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/acoplados"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection