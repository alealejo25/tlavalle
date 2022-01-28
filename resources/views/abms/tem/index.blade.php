@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de TEM <a href="tem/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.estaciones.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Provincia</th>
					<th>Impuesto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->provincia}}</td>
					<td class="text-right">${{  number_format($dato->impuesto,2,",",".")}}</td>

					<td>
					<form method="post" action="{{url('abms/tem/'.$dato->id) }}">
							<a href="{{url('abms/tem/'.$dato->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
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
