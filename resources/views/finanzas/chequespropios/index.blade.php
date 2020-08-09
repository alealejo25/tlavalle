@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Ingreso de Cheques Propios</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'finanzas/chequespropios','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->


			{{Form::token()}}
			<div class="Form-group">
				{{Form::label('descripcion', 'Descripcion')}}
				<input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." name="descripcion" id="descripcion"  value="{{old('descripcion')}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				{{Form::label('cantchueques', 'Cantidad de Cheques Correlativos')}}
				<input type="text" class="form-control {{$errors->has('cantchueques')?'is-invalid':''}}" placeholder="Cantidad de Cheques Correlativos..." name="cantchueques" id="cantchueques"  value="{{old('cantchueques')}}">
				{!! $errors->first('cantchueques','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				{{Form::label('numero', 'Numero')}}
				<input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" placeholder="Numero..." name="numero" id="numero"  value="{{old('numero')}}">
				{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="banco">Banco</label>
				{!!Form::select('banco_id',$bancos,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="cuentabancaria">Cuenta Bancaria</label>
				{!!Form::select('cuenta_bancaria_propia_id',$cuentasbancariaspropias,null,['class' => 'form-control','null','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." value="{{old('fecha')}}">
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
				<a href="/finanzas/chequespropios"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection