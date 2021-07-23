@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')

}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Camiones <a href="camiones/create"><button class="btn btn-success">Nuevo </button></a><a href="camiones/listarPdf"><button  class="btn btn-primary"> Reporte PDF</button></a></h3>
	</div>
	@include('abms.camiones.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nro Unidad</th>
					<th>Dominio</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Año</th>
					<th>Kilometros</th>
					<th>Ultimo Service</th>
					<th>Prox. Service Caja</th>
					<th>Prox. Service Diferencial</th>
					<th>Prox. Service Motor</th>
					<th>Fecha Ingreso</th>
					<th>Fecha Egreso</th>
					<th>Valor</th>
					<th>Amortizacion</th>
					<th>Foto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($camiones as $camion)
				<tr>
					<td>{{ $loop->iteration}}</td>
					<td>{{ $camion->nro_unidad}}</td>
					<td>{{ $camion->dominio}}</td>
					<td>{{ $camion->modelo}}</td>
					<td>{{ $camion->marca}}</td>
					<td>{{ $camion->año}}</td>
					<td>{{ $camion->km}}</td>
					<td>{{ $camion->ultimoservice}}</td>
					<td>{{ $camion->proximoservicecaja}}</td>
					<td>{{ $camion->proximoservicediferencial}}</td>
					<td>{{ $camion->proximoservicemotor}}</td>
					<td>{{ $camion->fecha_ingreso}}</td>
					<td>{{ $camion->fecha_egreso}}</td>
					<td>{{ $camion->valor}}</td>
					<td>{{ $camion->amortizacion}}</td>
					<td>
						<img src="{{ asset('storage').'/'.$camion->foto}}" alt="" width="70">
					</td>
					<td>
					<!-- 	<a href="{{url('abms/camiones/'.$camion->id.'/edit')}}">
							<button type=""class="btn btn-info">Editar</button></a> -->


						<form method="post" action="{{url('abms/camiones/'.$camion->id) }}">
							<a href="{{url('abms/camiones/'.$camion->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
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