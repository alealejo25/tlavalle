@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Modificar Registro de Moratorias/Plan de Pago Rentas</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::model($rentaprestamomoratoria,['method'=>'PATCH','route'=>['rentasprestamosmoratorias.update',$rentaprestamomoratoria->id]])!!}


			{{Form::token()}}
			<div class="Form-group">
				<label for="tipo">Tipo</label>
				{!!Form::select('tipo',['MORATORIA' => 'Moratoria', 'PLAN DE PAGO' => 'Plan de Pago'],$rentaprestamomoratoria->tipo,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
				{!! $errors->first('tipo','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="tipo_plan">Tipo de Plan</label>
				<input type="text" name="tipo_plan" class="form-control {{$errors->has('tipo_plan')?'is-invalid':''}}" placeholder="Tipo de Plan..." value="{{$rentaprestamomoratoria->tipo_plan}}">
				{!! $errors->first('monto_declarado','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." value="{{$rentaprestamomoratoria->descripcion}}">
				{!! $errors->first('monto_declarado','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cant_cuotas">Cantidad de Cuotas</label>
				<input type="text" name="cant_cuotas" class="form-control {{$errors->has('cant_cuotas')?'is-invalid':''}}" placeholder=" Cantidad de Cuotas..." value="{{$rentaprestamomoratoria->cant_cuotas}}">
				{!! $errors->first('cant_cuotas','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_primera_cuota">Fecha de Primera Cuota</label>
				<input type="date" name="fecha_primera_cuota" id="fecha_primera_cuota" class="form-control {{$errors->has('fecha_primera_cuota')?'is-invalid':''}}" placeholder="Fecha de primera cuota..." value="{{$rentaprestamomoratoria->fecha_primera_cuota}}">
				{!! $errors->first('fecha_primera_cuota','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ultima_cuota">Fecha de Ultima Cuota</label>
				<input type="date" name="fecha_ultima_cuota" id="fecha_ultima_cuota" class="form-control {{$errors->has('fecha_ultima_cuota')?'is-invalid':''}}" placeholder="Fecha de ultima cuota..." value="{{$rentaprestamomoratoria->fecha_ultima_cuota}}">
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
				<a href="/abms/rentasprestamosmoratorias"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection