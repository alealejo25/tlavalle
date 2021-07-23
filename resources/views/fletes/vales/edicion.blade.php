@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro Vale</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($vale,['method'=>'PATCH','route'=>['guardaredicion',$vale->id]])!!}


			{{Form::token()}}


			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('cantidad', 'Ingrese la cantidad de litros del Vale')}}
				<input type="text" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" placeholder="Cantidad..." name="cantidad" id="cantidad"  value="{{$vale->cantidad}}">
				{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div>
				<label for="estacion_id">Seleccione Estacion</label>
				{!!Form::select('estacion_id',$estaciones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>

			<div class="Form-group">
				<label for="nroremitoestacion">Numero de Remito de Estacion</label>
				<input type="text" name="nroremitoestacion" class="form-control {{$errors->has('nroremitoestacion')?'is-invalid':''}}" value="{{$vale->nroremitoestacion}}"> 
				{!! $errors->first('nroremitoestacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/tarifas"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection