@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Camion</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
			{!!Form::open(array('url'=>'abms/camiones','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
			{{Form::token()}}

			@include('abms.camiones.form')
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/camiones"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div>
@endsection