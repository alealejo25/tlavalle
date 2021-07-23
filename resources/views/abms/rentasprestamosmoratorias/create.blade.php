@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Moratorias/Plan de Pago Rentas</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'abms/rentasprestamosmoratorias','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->


			{{Form::token()}}

			<div class="Form-group" >
				{{Form::label('tipo', 'Tipo')}}
				<select name="tipo" id="tipo" class="form-control">
					<option value="">Selecccione un Tipo</option>
					<option value="MORATORIA">Moratoria</option>
					<option value="PLAN DE PLAGO">Plan de Pago</option>
				</select>
			</div>
			<div class="Form-group">
				<label for="tipo_plan">Tipo de Plan</label>
				<input type="text" name="tipo_plan" class="form-control {{$errors->has('tipo_plan')?'is-invalid':''}}" placeholder="Tipo de plan..." value="{{old('tipo_plan')}}">
				{!! $errors->first('tipo_plan','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." value="{{old('descripcion')}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="monto_declarado">Monto Declarado</label>
				<input type="text" name="monto_declarado" class="form-control {{$errors->has('monto_declarado')?'is-invalid':''}}" placeholder="Monto Declarado..." value="{{old('monto_declarado')}}">
				{!! $errors->first('monto_declarado','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cant_cuotas">Cantidad de Cuotas</label>
				<input type="text" name="cant_cuotas" class="form-control {{$errors->has('cant_cuotas')?'is-invalid':''}}"  placeholder="Cantidad de Cuotas..." value="{{old('cant_cuotas')}}">
				{!! $errors->first('cant_cuotas','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_primera_cuota">Fecha de la primera cuota</label>
				<input type="date" name="fecha_primera_cuota" class="form-control {{$errors->has('fecha_primera_cuota')?'is-invalid':''}}"  placeholder="Fecha Primera Cuota..." value="{{old('fecha_primera_cuota')}}">
				{!! $errors->first('fecha_primera_cuota','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ultima_cuota">Fecha de la ultima cuota</label>
				<input type="date" name="fecha_ultima_cuota" class="form-control {{$errors->has('fecha_ultima_cuota')?'is-invalid':''}}"  placeholder="Fecha Ultima Cuota..." value="{{old('fecha_ultima_cuota')}}">
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