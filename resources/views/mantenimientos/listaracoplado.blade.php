@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Mantenimientos de Acoplados</h3>
		
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
               @foreach ($acoplados as $acoplado)
				<tr>
					<td>{{ $acoplado->id}}</td>
					<td>{{ $acoplado->acoplado->dominio}}</td>
					<td>{{ $acoplado->fechainicio}}</td>
					<td>{{ $acoplado->fechafin}}</td>
					<td>{{ $acoplado->observacion}}</td>
				<!-- 	<td>{{ $acoplado->observacion}}</td> -->
					@if($acoplado->estado=='INICIADO')
						<td>{{ $acoplado->estado}}</td>
					@else
						<td>{{ 'FINALIZADO'}}</td>
					@endif
					

					<td>
					<form method="post">
						@if($acoplado->estado =='INICIADO')
							<a href="{{url('mantenimientos/'.$acoplado->id.'/editaracoplado')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
						@else
							<a href="{{url('mantenimientos/'.$acoplado->id.'/editarcamion')}}"><input type="button" disabled value="Editar" class="btn btn-info">	</a>
						@endif

						@if($acoplado->estado=='INICIADO')
							<a href="{{url('mantenimientos/'.$acoplado->id.'/finalizaracoplado')}}"><input type="button" value="Finalizar" class="btn btn-success">	</a>
						@else
							<a href="{{url('mantenimientos/'.$acoplado->id.'/finalizaracoplado')}}"><input type="button" disabled value="Finalizar" class="btn btn-success">	</a>
						@endif
							<a href="{{url('mantenimientos/'.$acoplado->id.'/finalizaracoplado')}}"><input type="button" value="Detalle" class="btn btn-warning">	</a>
					
					</form>


					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$acoplados->render()}}
	</div>
</div>

@endsection