@extends('layouts.admin')
@section('contenido')
@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="text-center">
		<h3>Ingreso y Egreso de Pallets</h3>
	</div>
</div>
<form action="/movimientos/pallets" method="post">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<h4>1. Datos del Comprobante</h4>
			<div class="card">
				<div class="row">
					<div class="Form-group col-lg-12" >

						{{Form::label('nrocomprobante', 'Nro. de Comprobante')}}
						<input type="text" class="form-control {{$errors->has('nrocomprobante')?'is-invalid':''}}" placeholder="Numero de comprobante..." name="nrocomprobante" id="nrocomprobante"  value="{{old('nrocomprobante')}}">
						{!! $errors->first('nrocomprobante','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="Form-group col-lg-12" >
						{{Form::label('clientes', 'Cliente')}}
						<select name="cliente_id" id="cliente" class="form-control">
							<option value="">Selecccione un cliente</option>
							@foreach ($clientes as $cliente) 
								<option value="{{ $cliente->id }}">{{$cliente->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="Form-group col-lg-12">
						<label for="">Chofer</label>
						<select name="chofer_id" id="chofer" class="form-control">
							<option value="">Selecccione un chofer</option>
							@foreach ($choferes as $chofer) 
								<option value="{{ $chofer->id }}">{{$chofer->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="Form-group col-lg-12" >
						{{Form::label('descripcion', 'Descripcion')}}
						<input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." name="descripcion" id="descripcion"  value="{{old('descripcion')}}">
						{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="Form-group col-lg-6" >
						{{Form::label('tipo', 'Tipo')}}
						<select name="tipo" id="tipo" class="form-control">
							<option value="">Selecccione un cliente</option>
							<option value="Egreso">EGRESO</option>
							<option value="Ingreso">INGRESO</option>
						</select>
					</div>
					<div class="Form-group col-lg-6">
						<label for="fechanac">Fecha del Comprobante</label>
						<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." value="{{old('fechanac')}}">
						{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="form-group col-lg-6" >
						{{Form::label('cantidad', 'Cantidad')}}
						<input type="number" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" placeholder="Ingrese Cantidad..." name="cantidad" id="cantidad"  value="{{old('cantidad')}}">
						{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
					</div>
				</div>	
			</div>

		<br>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success btn-block">Guardar</button>	
		</div>
		</div>

	</div>
</form>
@endsection

