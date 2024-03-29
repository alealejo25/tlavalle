@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Pago con Cheque Propio  - Proveedor</h3>

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
				{!!Form::open(['route' => 'guardarpagochequepropioproveedor','method'=>'POST'])!!}
			{{Form::token()}}


			<div class="Form-group">

				<input type="hidden" name="ordendepago_id" class="form-control {{$errors->has('ordendepago_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('ordendepago_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
<!-- 			<div class="Form-group">
				<label for="cheque_id">Seleccione el importe del Cheque Propio</label>
				{!!Form::select('chequepropio_id',$chequespropio,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div> -->

			<div class="Form-group">
				<select name="chequepropio_id" id="cheque" class="form-control" >
					<option value="">Selecccione el cheque</option>
						@foreach ($chequespropio as $chequespropios) 
							<option  value="{{ $chequespropios->id }}">{{$chequespropios->numero}} - {{$chequespropios->banco->denominacion}} - {{date("d/m/Y",strtotime($chequespropios->fecha))}}</option>
						@endforeach
				</select>
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