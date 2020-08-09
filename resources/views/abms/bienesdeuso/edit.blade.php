@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Bienes de Uso</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	

			{!!Form::model($biendeuso,['method'=>'PATCH','route'=>['bienesdeuso.update',$biendeuso->id]])!!}
            {{Form::token()}}
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('codigo', 'Codigo')}}
				<input type="text" name="codigo" class="form-control" value="{{$biendeuso->codigo}}">
			</div>
			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$biendeuso->descripcion}}">
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control" value="{{$biendeuso->fecha_ingreso}}">
			</div>
			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control" value="{{$biendeuso->valor}}">
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion</label>
				<input type="text" name="amortizacion" class="form-control" value="{{$biendeuso->amortizacion}}">
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

			<div class="Form-group">
				<br/>
				<a href="/abms/bienesdeuso"><button class="btn btn-success">Regresar</button></a>
			</div>

			<!-- <br>
			<a href="/almacen/categoria"><button class="btn btn-success">Volver</button></a> -->

		</div>
	</div>
@endsection