@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="text-center">
		<h3>Listar Movimientos</h3>
		@if(session('status'))
			@if(session('status')=='1')
				<div class="alert alert-success">
					Se Guardo el Registro!!!!		
				</div>
			@else
				<div class="alert alert-danger">
					NO SE GUARDO EL REGISTRO!!!!
					
				</div>
			@endif
		@endif
	</div>
</div>

<div class="row">	
		<div class="col">
			<table class="table">
				<thead>
				<tr>
					<th>Nro Comprobante</th>	
					<th>Cliente</th>
					<th>Chofer</th>
					<th>Receptor</th>
					<th>Fecha</th>
					<th>Tipo</th>
					<th>Opciones</th>
				</tr>
				</thead>
				<tbody>
				@foreach($movimientos as $value)
				<tr>
					
					<td>{{$value->nro_comprobante}}</td>
					<th>{{$value->cliente->nombre}}</th>
					<th>{{$value->chofer->nombre}}</th>
					<th>{{$value->receptor_mercaderia}}</th>
					<th>{{$value->fecha}}</th>
					<th>{{$value->tipo}}</th>
					<th>
						<form method="post">
							<a href="{{url('movimientos/articulos/'.$value->id.'/detalle')}}"><input type="button" value="Detalle" class="btn btn-success">	</a>
					
							<a href="{{url('movimientos/articulos/'.$value->id.'/editar')}}"><input type="button"  value="Editar" class="btn btn-warning">	</a>
						</form>
					</th>
				</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
</div>
@if(count($articulos)>0)
	<div class="row">	
		<div class="col">
			<table class="table">
				<thead>
				<tr>
					<th>Codigo Articulo</th>	
					<th>Nombre Articulo</th>
					<th>Cantidad</th>
					<th>Cantidad Actual</th>
					<th>Categoria</th>
				</tr>
				</thead>
				<tbody>
				@foreach($articulos as $value)
				<tr>
					<td>{{$value->codigo}}</td>
					<th>{{$value->nombre}}</th>
					<th>{{$value->cantidadmov}}</th>
					<th>{{$value->cantidad}}</th>
					<th>{{$value->categoria->nombre}}</th>
				</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
</div>
@endif
@endsection

