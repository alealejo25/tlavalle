@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Cuentas Corrientes Choferes </h3>
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
					<th>Telefono</th>

					<th>Saldo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($choferes as $chofer)
				<tr>
					<td>{{ $chofer->id}}</td>
					<td>{{ $chofer->nombre}}</td>
					<td>{{ $chofer->direccion}}</td>
					<td>{{ $chofer->nrocelular}}</td>

					<td>{{ $chofer->saldo}}</td>
					<td>
					<form method="post" action="{{url('cuentascorrientes/choferes/'.$chofer->id) }}">
							<a href="{{url('cuentascorrientes/choferes/'.$chofer->id.'/nuevocomprobante')}}"><input type="button" value="Nuevo Comprobante" class="btn btn-info">	</a>
							<a href="{{url('cuentascorrientes/choferes/'.$chofer->id.'/listar')}}"><input type="button" value="Comprobantes" class="btn btn-success">	</a>
							
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
