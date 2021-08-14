@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Detalle del Mantenimiento</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			<!-- {!!Form::open(array('url'=>'fletes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}  -->
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->
			@foreach ($camiones as $datos)
				<tr>
					<td><h4>Numero: {{ $datos->id}} - Nro de Unidad: {{ $datos->camion->nro_unidad}} Dominio: {{ $datos->camion->dominio}} </h4></td>
					<td><h5>Fecha de Inicio: {{ $datos->fechainicio}}</h4></td>
					<td><h5>Fecha de Fin: {{ $datos->fechafin}}</h4></td>
					<td><h5>Observacion: {{ $datos->observacion}}</h5></td>
					<td><h5>Estado: {{ $datos->estado}}</h5></td>
				</tr>
			@endforeach
			<br>
			<h4>Repuestos</h4>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Marca</th>
				</thead>
               @foreach ($consulta as $repuestos)
				<tr>
					<td>{{ $repuestos->codigo}}</td>
					<td>{{ $repuestos->nombre}}</td>
					<td>{{ $repuestos->cantidad}}</td>
					<td>{{ $repuestos->marca}}</td>
					
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
</div>
			
			<div class="Form-group">
				<br/>
				<a href="/mantenimientos/listarcamion"><button class="btn btn-success">Regresar</button></a>
				<input class="btn btn-primary" type="button" value="Imprimir" onclick="javascript:window.print()" />
				
			</div>

		</div>
	</div> 
@endsection