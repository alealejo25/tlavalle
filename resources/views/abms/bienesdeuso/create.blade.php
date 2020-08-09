@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Bienes de Uso</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'abms/bienesdeuso','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('codigo', 'Codigo')}}
				<input type="text" class="form-control {{$errors->has('codigo')?'is-invalid':''}}" placeholder="Codigo..." name="codigo" id="codigo"  value="{{old('codigo')}}">
				{!! $errors->first('codigo','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." value="{{old('descripcion')}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control {{$errors->has('fecha_ingreso')?'is-invalid':''}}" placeholder="Fecha Ingreso..." value="{{old('fecha_ingreso')}}">
				{!! $errors->first('fecha_ingreso','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control {{$errors->has('valor')?'is-invalid':''}}"  placeholder="Valor..." value="{{old('valor')}}">
				{!! $errors->first('valor','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion Anual</label>
				<input type="text" name="amortizacion" class="form-control {{$errors->has('amortizacion')?'is-invalid':''}}"  placeholder="Amortizacion Anual..." value="{{old('amortizacion')}}">
				{!! $errors->first('amortizacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/bienesdeuso"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection