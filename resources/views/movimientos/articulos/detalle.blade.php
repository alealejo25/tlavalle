@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Detalle de Movimiento de Articulos</h3>

	</div>
</div>

<div class="row">
	@foreach ($movimientos as $movimiento)
				<tr>
					<td><h4>Numero Comprobante: {{ $movimiento->nro_comprobante}}</h4></td>
					<td><h5>Tipo de movimiento: {{ $movimiento->tipo}}</h4></td>
					<td><h5>Cliente: {{ $movimiento->cliente->nombre}}</h5></td>
					<td><h5>Chofer: {{ $movimiento->chofer->nombre}}</h5></td>
					<td><h5>Receptor de Mercaderia: {{ $movimiento->receptor_mercaderia}}</h5></td>

				</tr>
	@endforeach
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Articulo</th>
					<th>Codigo</th>
					<th>Cant. Actual</th>
					<th>Categoria</th>
					<th>Fecha Mov.</th>
					<th>Cantidad</th>
				</thead>
               @foreach ($consulta as $datos)
				<tr>
					<td>{{ $datos->id}}</td>
					<td>{{ $datos->articulo->nombre}}</td>
					<td>{{ $datos->articulo->codigo}}</td>
					<td>{{ $datos->articulo->cantidad}}</td>
					<td>{{ $datos->articulo->categoria->nombre}}</td>
					<td>{{ $datos->fecha}}</td>
					<td>{{ $datos->cantidad}}</td>
				</tr>
					
								
				@endforeach
			</table>
		</div>
		
	</div>
</div>

@endsection