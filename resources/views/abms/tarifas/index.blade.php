@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tarifas <a href="tarifas/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.tarifas.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Descripcion</th>
					<th>Importe</th>
					<th>Cliente</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tarifas as $tarifa)
				<tr>
					<td>{{ $tarifa->id}}</td>
					<td>{{ $tarifa->descripcion}}</td>
					<td>{{ $tarifa->importe}}</td>
					<td>{{ $tarifa->cliente->nombre}}</td>
								
					<td>
					<form method="post" action="{{url('abms/tarifas/'.$tarifa->id) }}">
							<a href="{{url('abms/tarifas/'.$tarifa->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$tarifas->render()}}
	</div>
</div>

@endsection