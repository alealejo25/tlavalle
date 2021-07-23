@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Pago con Cheque Propio</h3>

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
				{!!Form::open(['route' => 'guardarpagochequepropio','method'=>'POST'])!!}
			{{Form::token()}}


			<div class="Form-group">
				<label for="proveedor_id">Seleccione Proveedor</label>
				{!!Form::select('proveedor_id',$proveedores,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div> 
			<div class="Form-group">
				<label for="cheque_id">Seleccione el importe del Cheque Propio</label>
				{!!Form::select('chequepropio_id',$cheques,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="importe">Importe</label>
				<input type="text" name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{old('importe')}}">
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha dl Cheque..." value="{{old('fecha')}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/pagos/cheque"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection