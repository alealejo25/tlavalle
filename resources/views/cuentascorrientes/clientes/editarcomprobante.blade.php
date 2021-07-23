@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Comprobante</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			{!!Form::open(['route' => ['guardaredicioncomprobante',$comprobante->id],'method'=>'POST'])!!}
			


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nrocomprobante', 'Nro. Comprobante')}}
				<input type="text" class="form-control {{$errors->has('nrocomprobante')?'is-invalid':''}}" placeholder="Numero de comprobante..." name="nrocomprobante" id="nrocomprobante"  value="{{$comprobante->nrocomprobante}}">
				{!! $errors->first('nrocomprobante','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fechavencimiento">Fecha Vencimiento</label>
				<input type="date" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." name="fechavencimiento" id="fechavencimiento"  value="{{$comprobante->fechavencimiento}}">
				{!! $errors->first('fechavencimiento','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('observacion', 'Observacion')}}
				<input type="text" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" placeholder="Observacion..." name="observacion" id="observacion"  value="{{$comprobante->observacion}}">
				{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}

			</div>

			
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>

			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				
			</div>

		</div>
	</div> 
@endsection