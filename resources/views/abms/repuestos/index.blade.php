@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Repuestos <a href="repuestos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.repuestos.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Marca</th>
					<th>Opciones</th>
				</thead>
               @foreach ($repuestos as $repuesto)
				<tr>
					<td>{{ $repuesto->id}}</td>
					<td>{{ $repuesto->codigo}}</td>
					<td>{{ $repuesto->nombre}}</td>
					<td>{{ $repuesto->cantidad}}</td>
					<td>{{ $repuesto->marca}}</td>
					
					<td>



						<form method="post" action="{{url('abms/repuestos/'.$repuesto->id) }}">
							<a href="{{url('abms/repuestos/'.$repuesto->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$repuestos->render()}}
	</div>
</div>

@endsection