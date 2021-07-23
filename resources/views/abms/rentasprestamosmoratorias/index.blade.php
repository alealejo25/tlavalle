@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Moratorias/Planes de Pago Rentas <a href="rentasprestamosmoratorias/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.rentasprestamosmoratorias.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Tipo</th>
					<th>Tipo de Plan</th>
					<th>Descripcion</th>
					<th>Monto Declarado</th>
					<th>Cant. Cuotas</th>
					<th>Fecha Primera Cuota</th>
					<th>Fecha Ultima Cuota</th>
				</thead>
               @foreach ($rentas_prestamos_moratorias as $renta_prestamo_moratoria)
				<tr>
					<td>{{ $renta_prestamo_moratoria->id}}</td>
					<td>{{ $renta_prestamo_moratoria->tipo}}</td>
					<td>{{ $renta_prestamo_moratoria->tipo_plan}}</td>
					<td>{{ $renta_prestamo_moratoria->descripcion}}</td>
					<td>{{ $renta_prestamo_moratoria->monto_declarado}}</td>
					<td>{{ $renta_prestamo_moratoria->cant_cuotas}}</td>
					<td>{{ $renta_prestamo_moratoria->fecha_primera_cuota}}</td>
					<td>{{ $renta_prestamo_moratoria->fecha_ultima_cuota}}</td>
					<td>
					<form method="post" action="{{url('abms/rentasprestamosmoratorias/'.$renta_prestamo_moratoria->id) }}">
							<a href="{{url('abms/rentasprestamosmoratorias/'.$renta_prestamo_moratoria->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$rentas_prestamos_moratorias->render()}}
	</div>
</div>

@endsection

