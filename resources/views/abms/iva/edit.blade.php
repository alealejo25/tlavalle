@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Iva</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::model($datos,['method'=>'PATCH','route'=>['iva.update',$datos->id]])!!}
			{{Form::token()}}
			
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('descripcion', 'Descripcion')}}
				<input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" placeholder="Descripcion..." name="descripcion" id="descripcion"  value="{{$datos->descripcion}}">
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}

			</div>

				<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('impuesto', 'Impuesto')}}
				<input type="text" class="form-control {{$errors->has('impuesto')?'is-invalid':''}}" placeholder="Impuesto..." name="impuesto" id="impuesto"  value="{{$datos->impuesto}}">
				{!! $errors->first('impuesto','<div class="invalid-feedback">:message</div>')!!}
				
			</div>
			

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/iva"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection