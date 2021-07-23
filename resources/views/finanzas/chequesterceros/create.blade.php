@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Ingreso de Cheque de Tercero</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'finanzas/chequesterceros','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('numero', 'Numero')}}
				<input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" placeholder="Numero..." name="numero" id="numero"  value="{{old('numero')}}">
				{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="importe">Importe</label>
				<input type="number" step=0.01 name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{old('importe')}}">
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha dl Cheque..." value="{{old('fecha')}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cliente">Cliente</label>
				{!!Form::select('cliente_id',$clientes,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>


			<div class="Form-group">
				<label for="banco">Banco</label>
				{!!Form::select('banco_id',$bancos,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/finanzas/chequesterceros"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection