@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Movimiento de Articulos

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
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nro Comprobante</th>
					<th>Cliente</th>
					<th>Chofer</th>
					<th>Receptor</th>
					<th>Fecha</th>
					<th>Tipo</th>
					<th>Operacion</th>
					
				</thead>
               @foreach ($movimientos as $datos)
				<tr>
					<td>{{ $datos->id}}</td>
					<td>{{ $datos->nro_comprobante}}</td>
					<td>{{ $datos->cliente->nombre}}</td>
					<td>{{ $datos->chofer->nombre}}</td>
					<td>{{ $datos->receptor_mercaderia}}</td>
					<td>{{ $datos->fecha}}</td>
					<td>{{ $datos->tipo}}</td>
					
					<td>
						<form method="get" action="{{url('movimientos/edicionmovimientoarticulo/'.$datos->id) }}">
							
							<a href="{{url('movimientos/edicionmovimientoarticulo/'.$datos->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							
							<a href="{{url('movimientos/edicionmovimientoarticulo/'.$datos->id.'/detalle')}}"><input type="button" value="Detalle" class="btn btn-info">	</a>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$movimientos->render()}}
	</div>
	
</div>

@endsection