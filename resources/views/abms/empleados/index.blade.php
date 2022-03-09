@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empleados <a href="empleados/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
		@include('abms.empleados.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DNI</th>
					<th>Direccion</th>
					<th>Fecha de Nac.</th>
					<th>Nro. Telefono</th>
					<th>Area</th>
					<th>Sueldo Anterior</th>
					<th>Sueldo Actual</th>
					<th>Saldo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->id}}</td>
					<td>{{ $dato->nombre}}</td>
					<td>{{ $dato->apellido}}</td>
					<td>{{ $dato->dni}}</td>
					<td>{{ $dato->direccion}}</td>
					<td>{{date("d/m/Y",strtotime($dato->fechanac)) }}</td>
					<td>{{ $dato->nrocelular}}</td>
					<td>{{ $dato->area}}</td>
					<td class="text-right">${{  number_format($dato->sueldoanterior,2,",",".")}}</td>
					<td class="text-right">${{  number_format($dato->sueldoactual,2,",",".")}}</td>
					<td class="text-right">${{  number_format($dato->saldo,2,",",".")}}</td>
					
					
					
					<td>



						<form method="post" action="{{url('abms/empleados/'.$dato->id) }}">
							<a href="{{url('abms/empleados/'.$dato->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$datos->render()}}
	</div>
</div>

@endsection