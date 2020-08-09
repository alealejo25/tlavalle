@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Modificar Registro de Moratorias/Plan de Pago AFIP</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::model($afipprestamomoratoria,['method'=>'PATCH','route'=>['afipprestamosmoratorias.update',$afipprestamomoratoria->id]])!!}


			{{Form::token()}}
			<div class="Form-group">
				<label for="tipo">Tipo</label>
				{!!Form::select('tipo',['MORATORIA' => 'Moratoria', 'PLAN DE PAGO' => 'Plan de Pago'],$afipprestamomoratoria->tipo,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
				{!! $errors->first('tipo','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="impuesto">Impuesto</label>
				{!!Form::select('impuesto',['631' => '631', 'AUTONOMO' => 'Autonomo', 'GANANCIAS' => 'Ganancias', 'IVA' => 'IVA'],$afipprestamomoratoria->impuesto,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
				{!! $errors->first('impuesto','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="monto_declarado">Monto Declarado</label>
				<input type="text" name="monto_declarado" class="form-control {{$errors->has('monto_declarado')?'is-invalid':''}}" placeholder="Monto Declarado..." value="{{$afipprestamomoratoria->monto_declarado}}">
				{!! $errors->first('monto_declarado','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cant_cuotas">Cantidad de Cuotas</label>
				<input type="text" name="cant_cuotas" class="form-control {{$errors->has('cant_cuotas')?'is-invalid':''}}" placeholder=" Cantidad de Cuotas..." value="{{$afipprestamomoratoria->cant_cuotas}}">
				{!! $errors->first('cant_cuotas','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_primera_cuota">Fecha de Primera Cuota</label>
				<input type="date" name="fecha_primera_cuota" id="fecha_primera_cuota" class="form-control {{$errors->has('fecha_primera_cuota')?'is-invalid':''}}" placeholder="Fecha de primera cuota..." value="{{$afipprestamomoratoria->fecha_primera_cuota}}">
				{!! $errors->first('fecha_primera_cuota','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ultima_cuota">Fecha de Ultima Cuota</label>
				<input type="date" name="fecha_ultima_cuota" id="fecha_ultima_cuota" class="form-control {{$errors->has('fecha_ultima_cuota')?'is-invalid':''}}" placeholder="Fecha de ultima cuota..." value="{{$afipprestamomoratoria->fecha_ultima_cuota}}">
				{!! $errors->first('fecha_ultima_cuota','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/afipprestamosmoratorias"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection