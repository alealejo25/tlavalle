@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Bienes de Uso <a href="bienesdeuso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>

					<!-- BUSCADOR DE aCOPLADO-->
			{!!Form::open(['route'=>'bienesdeuso.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Acoplado..','aria-describedby'=>'search'])!!}
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
					<th>Descripcion</th>
					<th>Fecha Ingreso</th>
					<th>Fecha Egreso</th>
					<th>Valor</th>
					<th>Amortizacion</th>
				</thead>
               @foreach ($bienes_de_uso as $bien_de_uso)
				<tr>
					<td>{{ $bien_de_uso->id}}</td>
					<td>{{ $bien_de_uso->codigo}}</td>
					<td>{{ $bien_de_uso->descripcion}}</td>
					<td>{{ $bien_de_uso->fecha_ingreso}}</td>
					<td>{{ $bien_de_uso->fecha_egreso}}</td>
					<td>{{ $bien_de_uso->valor}}</td>
					<td>{{ $bien_de_uso->amortizacion}}</td>
					<td>
					<form method="post" action="{{url('abms/bienesdeuso/'.$bien_de_uso->id) }}">
							<a href="{{url('abms/bienesdeuso/'.$bien_de_uso->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$bienes_de_uso->render()}}
	</div>
</div>

@endsection
