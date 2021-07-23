@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de detalle de Movimiento de Articulos

		<!-- <a href="acoplados/listarPdf"><button  class="btn btn-primary">Reporte PDF</button></a></h3> -->
	</div>
				<!-- BUSCADOR DE aCOPLADO-->
<!-- 			{!!Form::open(['route'=>'acoplados.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Acoplado..','aria-describedby'=>'search'])!!}
					<span class="input-group-addon"  id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			{!!Form::close()!!} -->
 			<!-- FIN DEL BUSCADOR-->	
	
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
					<th>Categoria</th>
					<th>Fecha</th>
					<th>Cantidad</th>

					
				</thead>
               @foreach ($consulta as $datos)
				<tr>
					<td>{{ $datos->id}}</td>
					<td>{{ $datos->articulo->nombre}}</td>
					<td>{{ $datos->articulo->categoria->nombre}}</td>
					<td>{{ $datos->fecha}}</td>
					<td>{{ $datos->cantidad}}</td>
					
 						<!-- ACA HAY QUE PONER UN BOTON PARA ANULAR EL ARTICULO -->
						<!-- <form method="get" action="{{url('movimientos/edicionmovimientoarticulo/'.$datos->id) }}">
							<a href="{{url('movimientos/edicionmovimientoarticulo/'.$datos->id.'/editardetalle')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
						</form> -->
						

				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
	
</div>

@endsection