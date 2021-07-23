@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Edicion de Mantenimiento  de Camiones</h3>
					
				</div>
			</div>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 		
 			<form action="/mantenimientos/guardaredicioncamion" method="PATCH">
		
            {{Form::token()}}
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('camion_id', 'Dominio del Camion: '.$mantenimiento->camion->dominio)}}
			</div>
			<div class="Form-group">
				<label for="repuesto_id">Seleccione Repuestos</label>
				{!!Form::select('repuesto_id',$repuestos,$repuestousados->repuesto->id,['class' => 'form-control','multiple','requerid' ])!!}
			</div>

			
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Iniciar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/mantenimientos/camion"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection