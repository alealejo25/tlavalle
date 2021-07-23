@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Mantenimiento Acoplados 			<a href="/mantenimientos/listaracoplado"><button class="btn btn-success">Ver Mantenimientos</button></a></h3>
					
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
 		<!--	{!!Form::open(array('url'=>'guardartransferencia','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} -->
				{!!Form::open(['route' => 'guardaracoplado','method'=>'POST'])!!}
			{{Form::token()}}


			<div class="Form-group">
				<label for="acoplado_id">Seleccione Acoplado a relizar mantenimiento</label>
				{!!Form::select('acoplado_id',$acoplados,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="repuesto_id">Seleccione Repuestos</label>
				{!!Form::select('repuesto_id[]',$repuestos,null,['class' => 'form-control','multiple','requerid' ])!!}
			</div>
			<br><br>
			<div class="Form-group">
				<label for="manodeobra_id">Seleccione Mano de Obra</label>
				{!!Form::select('manodeobra_id[]',$manodeobra,null,['class' => 'form-control','multiple','requerid' ])!!}
			</div>
			<br><br>
			<div class="Form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" placeholder="Observacion..." value="{{old('observacion')}}">
				{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
			</div>


			<div class="Form-group">
				<label for="fecha">Fecha de Inicio del Mantenimiento</label>
				<input type="date" name="fechainicio" id="fechainicio" class="form-control {{$errors->has('fechainicio')?'is-invalid':''}}" placeholder="Fecha Inicio del Mantenimiento..." value="{{old('fechainicio')}}">
				{!! $errors->first('fechainicio','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Iniciar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/mantenimientos/acoplado"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection