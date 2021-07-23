@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Mantenimientos de Camiones</h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nro. de Servicio</th>
					<th>Camion</th>
					<th>Fecha de Inicio</th>
					<th>Fecha de Finalizacion</th>
					<th>Observacion</th>
					<!-- <th>Empleado</th> -->
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($camiones as $camion)
				<tr>
					<td>{{ $camion->id}}</td>
					<td>{{ $camion->camion->dominio}}</td>
					<td>{{ $camion->fechainicio}}</td>
					<td>{{ $camion->fechafin}}</td>
					<td>{{ $camion->observacion}}</td>
				<!-- 	<td>{{ $camion->observacion}}</td> -->
					@if($camion->estado=='INICIADO')
						<td>{{ $camion->estado}}</td>
					@else
						<td>{{ 'FINALIZADO'}}</td>
					@endif
					

					<td>
					<form method="post">
						@if($camion->estado =='INICIADO')
							<a href="{{url('mantenimientos/'.$camion->id.'/editarcamion')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
						@else
							<a href="{{url('mantenimientos/'.$camion->id.'/editarcamion')}}"><input type="button" disabled value="Editar" class="btn btn-info">	</a>
						@endif

						@if($camion->estado=='INICIADO')
							<a href="{{url('mantenimientos/'.$camion->id.'/finalizarcamion')}}"><input type="button" value="Finalizar" class="btn btn-success">	</a>
						@else
							<a href="{{url('mantenimientos/'.$camion->id.'/finalizarcamion')}}"><input type="button" disabled value="Finalizar" class="btn btn-success">	</a>
						@endif
							<a href="{{url('mantenimientos/'.$camion->id.'/finalizarcamion')}}"><input type="button" value="Detalle" class="btn btn-warning">	</a>
					
					</form>


					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$camiones->render()}}
	</div>
</div>

@endsection