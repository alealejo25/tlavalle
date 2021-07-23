@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Vale</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			<!-- {!!Form::open(array('url'=>'fletes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}  -->
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->
			{!!Form::open(['route' => 'guardarpagoefectivochofer','method'=>'POST'])!!}
			
			{{Form::token()}}
			<div class="Form-group">

				<input type="hidden" name="ordendepago_id" class="form-control {{$errors->has('ordendepago_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('ordendepago_id','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="importe">Ingrese el importe del Pago en Efectivo para la OP</label>
				<input type="number" step=0.01 name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" value="{{old('importe')}}"> 
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="caja">Caja</label>
				{!!Form::select('caja_id',$datoscaja,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/pagos/ordenesdepagos"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection