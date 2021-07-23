@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Vehiculos Particulares <a href="vehiculosparticulares/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.vehiculosparticulares.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Dominio</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Año</th>
					<th>KM</th>
					<th>Fecha Ingreso</th>
					<th>Fecha Egreso</th>
					<th>Valor</th>
					<th>Amortizacion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($vehiculos_particulares as $vehiculoparticular)
				<tr>
					<td>{{ $vehiculoparticular->id}}</td>
					<td>{{ $vehiculoparticular->dominio}}</td>
					<td>{{ $vehiculoparticular->modelo}}</td>
					<td>{{ $vehiculoparticular->marca}}</td>
					<td>{{ $vehiculoparticular->año}}</td>
					<td>{{ $vehiculoparticular->km}}</td>
					<td>{{ $vehiculoparticular->fecha_ingreso}}</td>
					<td>{{ $vehiculoparticular->fecha_egreso}}</td>
					<td>{{ $vehiculoparticular->valor}}</td>
					<td>{{ $vehiculoparticular->amortizacion}}</td>
					<td>
					<form method="post" action="{{url('abms/vehiculosparticulares/'.$vehiculoparticular->id) }}">
							<a href="{{url('abms/vehiculosparticulares/'.$vehiculoparticular->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$vehiculos_particulares->render()}}
	</div>
</div>

@endsection
