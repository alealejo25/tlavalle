@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<form method="post">
			<h3>Listado de vales de fletes
			<a href="{{url('fletes/vales/'.$id.'/nuevovale')}}"><input type="button" value="Nuevo Vale" class="btn btn-info">	</a></h3>
		</form>
	
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive -sm">
			<table class="table table-striped table-bordered table-condensed table-hover">

				<thead>
					<th>#</th>
					<th>Remito Vales</th>
					<th>Remito Estacion</th>
					<th>Cantidad</th>
					<th>Opciones</th>

				</thead>
               @foreach ($datosconsulta as $datosconsultas)
				<tr>
					<td>{{ $datosconsultas->vale_id}}</td>
					<td>{{ $datosconsultas->nroremitovale}}</td>
					<td>{{ $datosconsultas->nroremitoestacion}}</td>
					<td align="right"> {{ $datosconsultas->cantidad}}</td>
										
					<td>
					<form action="{{url('fletes/vales/eliminarvale/'.$datosconsultas->vale_id) }}">
							<a href="{{url('fletes/vales/'.$datosconsultas->vale_id.'/edicion')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
					</form>
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
</div>

@endsection