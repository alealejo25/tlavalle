@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cuentas Bancarias de Proveedores <a href="cuentasbancariasproveedores/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
@include('abms.cuentasbancariasproveedores.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>CBU</th>
					<th>Alias CBU</th>
					<th>Titular</th>
					<th>DNI</th>
					<th>Identifacion Tributaria</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($cuentasbancariasproveedores as $cuentabancariaproveedor)
				<tr>
					<td>{{ $cuentabancariaproveedor->id}}</td>
					<td>{{ $cuentabancariaproveedor->cbu}}</td>
					<td>{{ $cuentabancariaproveedor->alias_cbu}}</td>
					<td>{{ $cuentabancariaproveedor->titular}}</td>
					<td>{{ $cuentabancariaproveedor->dni}}</td>
					<td>{{ $cuentabancariaproveedor->identificacion_tributaria}}</td>
					<td>{{ $cuentabancariaproveedor->tipo}}</td>
					<td>{{ $cuentabancariaproveedor->proveedor->nombre}}</td> 

					
					<td>



						<form method="post" action="{{url('abms/cuentasbancariasproveedores/'.$cuentabancariaproveedor->id) }}">
							<a href="{{url('abms/cuentasbancariasproveedores/'.$cuentabancariaproveedor->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$cuentasbancariasproveedores->render()}}
	</div>
</div>

@endsection