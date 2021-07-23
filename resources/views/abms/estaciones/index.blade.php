@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estaciones <a href="estaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.estaciones.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Contacto</th>
					<th>Telefono Contacto</th>
					<th>Cuit</th>
					<th>Saldo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estaciones as $estacion)
				<tr>
					<td>{{ $estacion->id}}</td>
					<td>{{ $estacion->nombre}}</td>
					<td>{{ $estacion->direccion}}</td>
					<td>{{ $estacion->telefono}}</td>
					<td>{{ $estacion->contacto}}</td>
					<td>{{ $estacion->telefono_contacto}}</td>
					<td>{{ $estacion->cuit}}</td>
					<td>{{ $estacion->saldo}}</td>
					<td>
					<form method="post" action="{{url('abms/estaciones/'.$estacion->id) }}">
							<a href="{{url('abms/estaciones/'.$estacion->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
					</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$estaciones->render()}}
	</div>
</div>

@endsection
