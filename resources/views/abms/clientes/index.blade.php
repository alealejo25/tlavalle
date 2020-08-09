@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="clientes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Provincia</th>
					<th>Localidad</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Contacto</th>
					<th>Telefono Contacto</th>
					<th>Cuit</th>
					<th>Saldo</th>
					<th>Cliente Pallet</th>
					<th>Saldo Pallet</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cliente)
				<tr>
					<td>{{ $cliente->id}}</td>
					<td>{{ $cliente->nombre}}</td>
					<td>{{ $cliente->direccion}}</td>
					<td>{{ $cliente->provincia}}</td>
					<td>{{ $cliente->localidad}}</td>
					<td>{{ $cliente->telefono}}</td>
					<td>{{ $cliente->email}}</td>
					<td>{{ $cliente->contacto}}</td>
					<td>{{ $cliente->telefono_contacto}}</td>
					<td>{{ $cliente->cuit}}</td>
					<td>{{ $cliente->saldo}}</td>
					@if($cliente->clientepallet===NULL)
						<td><p>SI</p></td>
					@else
						<td>NO</td>
					@endif
					<td>{{ $cliente->saldopallet}}</td>
					<td>
					<form method="post" action="{{url('abms/clientes/'.$cliente->id) }}">
							<a href="{{url('abms/clientes/'.$cliente->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
					</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection
