@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Movimiento de Articulo</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($movimientos,['method'=>'PATCH','route'=>['edicionmovimientoarticulo.update',$movimientos->id]])!!}


			{{Form::token()}}
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nro_comprobante', 'Nro Comprobante')}}
				<input type="text" class="form-control {{$errors->has('nro_comprobante')?'is-invalid':''}}" placeholder="Nro de Comprobante..." name="nro_comprobante" id="nro_comprobante"  value="{{$movimientos->nro_comprobante}}">
				{!! $errors->first('nro_comprobante','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<label for="cliente_id">Cliente</label>
				{!!Form::select('cliente_id',$clientes,$movimientos->cliente->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('cliente_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="chofer_id">Chofer</label>
				{!!Form::select('chofer_id',$choferes,$movimientos->chofer->id,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}

				{!! $errors->first('chofer_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('receptor_mercaderia', 'Receptor de Mercaderia')}}
				<input type="text" class="form-control {{$errors->has('nro_comprobante')?'is-invalid':''}}" placeholder="Receptor de Mercaderia..." name="receptor_mercaderia" id="receptor_mercaderia"  value="{{$movimientos->receptor_mercaderia}}">
				{!! $errors->first('receptor_mercaderia','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('fecha', 'Fecha')}}
				<input type="date" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." name="fecha" id="fecha"  value="{{$movimientos->fecha}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/movimientos/edicionmovimientoarticulo"><button class="btn btn-success">Regresar</button></a>
			</div>
		</div>
	</div> 
@endsection