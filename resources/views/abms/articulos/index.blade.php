@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos <a href="articulos/create"><button class="btn btn-success">Nuevo</button></a>
		<a href="articulos/listarPdf"><button  class="btn btn-primary">Reporte PDF</button></a></h3>
		
	</div>

				<!-- BUSCADOR DE CLIENTE-->
			{!!Form::open(['url'=>'abms/articulos','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Articulos..','aria-describedby'=>'search'])!!}
					<span class="input-group-addon"  id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			{!!Form::close()!!}
 			<!-- FIN DEL BUSCADOR-->
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Categoria</th>
					<th>Cliente</th>
					<th>Opciones</th>
				</thead>
               @foreach ($articulos as $articulo)
				<tr>
					<td>{{ $articulo->id}}</td>
					<td>{{ $articulo->codigo}}</td>
					<td>{{ $articulo->nombre}}</td>
					<td>{{ $articulo->cantidad}}</td>
					<td>{{ $articulo->categoria->nombre}}</td>
					<td>{{ $articulo->cliente->nombre}}</td>
					
					<td>
						<form method="post" action="{{url('abms/articulos/'.$articulo->id) }}">
							<a href="{{url('abms/articulos/'.$articulo->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>

@endsection