@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Choferes <a href="choferes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
		@include('abms.choferes.search')
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
					<th>Saldo</th>
					<th>Dominio Camion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($choferes as $chofer)
				<tr>
					<td>{{ $chofer->id}}</td>
					<td>{{ $chofer->nombre}}</td>
					<td>{{ $chofer->apellido}}</td>
					<td>{{ $chofer->dni}}</td>
					<td>{{ $chofer->direccion}}</td>
					<td>{{ $chofer->fechanac}}</td>
					<td>{{ $chofer->nrocelular}}</td>
					<td>{{ $chofer->saldo}}</td>
					@if($chofer->camion_id===NULL)
						<td><p>SIN ASOCIAR</p></td>
					@else
						<td>{{ $chofer->camion->dominio}}</td>
					@endif
					
					<td>



						<form method="post" action="{{url('abms/choferes/'.$chofer->id) }}">
							<a href="{{url('abms/choferes/'.$chofer->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$choferes->render()}}
	</div>
</div>

@endsection