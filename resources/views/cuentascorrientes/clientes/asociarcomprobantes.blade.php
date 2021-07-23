@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Remitos - Cliente:  @foreach ($cliente as $clientes){{$clientes->nombre}} 				@endforeach
					</h3>
				</div>
			</div>

	{!!Form::open(['route' => ['guardarfacturac',$id],'method'=>'POST'])!!}
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="table-responsive">
			
				<div class="form-group">
					{{Form::label('remitos','Seleccione los remitos para asociar a una factura')}}
					<div>
						@foreach ($cuentacorrientecliente as $remitos)
						<label>
							{{Form::checkbox('rem[]',$remitos->id)}} Nro de Remito:  {{$remitos->nrocomprobante}} / Observacion: {{$remitos->observacion}}	
						</label>
						<br>
						@endforeach
					</div>
				</div>
				<div class="Form-group">
				<label for="nrocomprobante">Numero de Comprobante</label>
								<input type="text" name="nrocomprobante" class="form-control {{$errors->has('nrocomprobante')?'is-invalid':''}}" value="{{old('nrocomprobante')}}">
								{!! $errors->first('nrocomprobante','<div class="invalid-feedback">:message</div>')!!}
				</div>
				<div class="Form-group">
					<label for="fechaemision">Fecha Emision</label>
					<input type="date" name="fechaemision" id="fechaemision" class="form-control {{$errors->has('fechaemision')?'is-invalid':''}}" placeholder="Fecha de emision..." value="{{old('fechaemision')}}">
					{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
				</div>
				<div class="Form-group">
					<label for="fechavencimiento">Fecha Vencimiento</label>
					<input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control {{$errors->has('fechavencimiento')?'is-invalid':''}}" placeholder="Fecha de vencimiento..." value="{{old('fechavencimiento')}}">
					{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
				</div>
				<div class="Form-group">
					<label for="importe">Importe</label>
					<input type="text" name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{old('importe')}}">
					{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
				</div>
				<div class="Form-group">
					<label for="observacion">Observacion</label>
					<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" value="{{old('observacion')}}"> 
					{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
				</div>
				<div class="Form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>

	</div>

			{!!Form::close()!!}



@endsection