@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores <a href="proveedores/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	@include('abms.proveedores.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Contacto</th>
					<th>Telefono Contacto</th>
					<th>Cuit</th>
					<th>Saldo</th>
					<th>Saldo Inicial</th>
					<th>Opciones</th>
				</thead>
               @foreach ($proveedores as $proveedor)
				<tr>
					<td>{{ $proveedor->id}}</td>
					<td>{{ $proveedor->nombre}}</td>
					<td>{{ $proveedor->direccion}}</td>
					<td>{{ $proveedor->telefono}}</td>
					<td>{{ $proveedor->email}}</td>
					<td>{{ $proveedor->contacto}}</td>
					<td>{{ $proveedor->telefono_contacto}}</td>
					<td>{{ $proveedor->cuit}}</td>
					<td>{{ $proveedor->saldo}}</td>
					<td>{{ $proveedor->saldoinicial}}</td>
					<td>
					<form method="post" action="{{url('abms/proveedores/'.$proveedor->id) }}">
							<a href="{{url('abms/proveedores/'.$proveedor->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
					</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>

@endsection
