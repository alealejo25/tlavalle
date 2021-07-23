@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Cheques</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($chequesterceros,['method'=>'PATCH','route'=>['chequesterceros.update',$chequesterceros->id]])!!}


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('numero', 'Numero')}}
				<input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" placeholder="Numero..." name="numero" id="numero"  value="{{$chequesterceros->numero}}">
				{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<label for="importe">Importe</label>
				<input type="number" step=0.01 name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{$chequesterceros->importe}}">
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." value="{{$chequesterceros->fecha}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="cliente_id">Cliente</label>
				{!!Form::select('cliente_id',$clientes,$chequesterceros->cliente->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('cliente_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="proveedor_id">Proveedor</label>
				{!!Form::select('proveedor_id',$proveedores,$chequesterceros->proveedor->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('proveedor_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="banco_id">Banco</label>
				{!!Form::select('banco_id',$bancos,$chequesterceros->banco->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('banco_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
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