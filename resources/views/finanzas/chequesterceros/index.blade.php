@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cheques de terceros <a href="chequesterceros/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Numero</th>
					<th>Importe</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Cliente</th>
					<th>Proveedor</th>
					<th>Banco</th>
				</thead>
               @foreach ($chequesterceros as $chequetercero)
				<tr>
					<td>{{ $chequetercero->id}}</td>
					<td>{{ $chequetercero->numero}}</td>
					<td>$ {{$chequetercero->importe}}</td>
					<td>{{ $chequetercero->fecha}}</td>
					<td>{{ $chequetercero->estado}}</td>
					<td>{{ $chequetercero->cliente->nombre}}</td>
					@if ($chequetercero->proveedor_id != NULL)
						<td>{{ $chequetercero->proveedor->nombre}}</td>
					@else
						<td>SIN ASIGNAR</td>
					@endif
					<td>{{ $chequetercero->banco->denominacion}}</td>
					<td>
					<form method="post" action="{{url('finanzas/chequesterceros/'.$chequetercero->id) }}">
							<a href="{{url('finanzas/chequesterceros/'.$chequetercero->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>

						
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$chequesterceros->render()}}
	</div>
</div>

@endsection