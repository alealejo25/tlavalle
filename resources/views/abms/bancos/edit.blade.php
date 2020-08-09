@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Registro de Bancos</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			{!!Form::model($bancos,['method'=>'PATCH','route'=>['bancos.update',$bancos->id]])!!}


			{{Form::token()}}

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('denominacion', 'Denominacion')}}
				<input type="text" class="form-control {{$errors->has('denominacion')?'is-invalid':''}}" placeholder="Denominacion..." name="denominacion" id="denominacion"  value="{{$bancos->denominacion}}">
				{!! $errors->first('denominacion','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/bancos"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection