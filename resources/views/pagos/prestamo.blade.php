@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Prestamo a Choferes</h3>

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
				{!!Form::open(['route' => 'guardarprestamo','method'=>'POST'])!!}
			{{Form::token()}}


			<div class="Form-group">
				<label for="chofer_id">Seleccione Chofer</label>
				{!!Form::select('chofer_id',$choferes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." value="{{old('descripcion')}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				{{Form::label('modoprestamo', 'Modo del Prestamo')}}
				{!!Form::select('modoprestamo',['articulo'=>'ARTICULO','efectivo'=>'EFECTIVO','transferencia'=>'TRANSFERENCIA'], null, ['placeholder' => 'Ingrese el modo como se entrega el prestamo...'])!!}
			<div class="Form-group">
				<label for="importe">Importe</label>
				<input type="text" name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{old('importe')}}">
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cantcuotas">Cantidad de Cuotas</label>
				<input type="text" name="cantcuotas" class="form-control {{$errors->has('cantcuotas')?'is-invalid':''}}" placeholder="Cantidad de Cuotas..." value="{{old('cantcuotas')}}">
				{!! $errors->first('cantcuotas','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fechainicio">Fecha Inicio del Pago</label>
				<input type="date" name="fechainicio" id="fechainicio" class="form-control {{$errors->has('fechainicio')?'is-invalid':''}}" placeholder="Fecha Inicio del Pago..." value="{{old('fechainicio')}}">
				{!! $errors->first('fechainicio','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="caja_id">Selecccione Caja</label>
				{!!Form::select('caja_id',$cajas,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/pagos/pagoefectivo"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection