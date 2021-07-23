@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Cierre de Caja</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'finanzas/cierrecajas','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			{{Form::token()}}

			<div class="Form-group">

				
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('descripcion', 'Descripcion')}}
				<input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." name="descripcion" id="descripcion"  value="{{old('descripcion')}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="dinerofisico">Dinero Fisico</label>
				<input type="text" name="dinerofisico" class="form-control {{$errors->has('dinerofisico')?'is-invalid':''}}" placeholder="Dinero Fisico..." value="{{old('dinerofisico')}}">
				{!! $errors->first('dinerofisico','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha dl Cheque..." value="{{old('fecha')}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="caja">Caja</label>
				{!!Form::select('caja_id',$cajas,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>


			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/finanzas/cierrecajas"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection