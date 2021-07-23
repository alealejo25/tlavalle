@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Acoplados
		@can('acoplados_create')
		<a href="acoplados/create"><button class="btn btn-success">Nuevo</button></a>
		@endcan
		<a href="acoplados/listarPdf"><button  class="btn btn-primary">Reporte PDF</button></a></h3>
	</div>
				<!-- BUSCADOR DE aCOPLADO-->
			{!!Form::open(['route'=>'acoplados.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
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
					<th>Dominio</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Año</th>
					<th>Fecha Ingreso</th>
					<th>Fecha Egreso</th>
					<th>Valor</th>
					<th>Amortizacion</th>
					<th>Dominio Camion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($acoplados as $acoplado)
				<tr>
					<td>{{ $acoplado->id}}</td>
					<td>{{ $acoplado->dominio}}</td>
					<td>{{ $acoplado->modelo}}</td>
					<td>{{ $acoplado->marca}}</td>
					<td>{{ $acoplado->año}}</td>
					<td>{{ $acoplado->fecha_ingreso}}</td>
					<td>{{ $acoplado->fecha_egreso}}</td>
					<td>{{ $acoplado->valor}}</td>
					<td>{{ $acoplado->amortizacion}}</td>
					@if($acoplado->camion_id===NULL)
						<td><p>SIN ASOCIAR</p></td>
					@else
						<td>{{ $acoplado->camion->dominio}}</td>
					@endif
					<td>
						<form method="post" action="{{url('abms/acoplados/'.$acoplado->id) }}">
							@can('acoplados_edit')
							<a href="{{url('abms/acoplados/'.$acoplado->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							@endcan
							@can('acoplados_destroy')
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
							@endcan

						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$acoplados->render()}}
	</div>

</div>

@endsection