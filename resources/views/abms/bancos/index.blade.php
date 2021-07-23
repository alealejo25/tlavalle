@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Bancos <a href="bancos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>

				<!-- BUSCADOR DE CLIENTE-->
			{!!Form::open(['route'=>'bancos.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Cliente..','aria-describedby'=>'search'])!!}
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
					<th>Denominacion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($bancos as $banco)
				<tr>
					<td>{{ $banco->id}}</td>
					<td>{{ $banco->denominacion}}</td>
					<td>
					<form method="post" action="{{url('abms/bancos/'.$banco->id) }}">
							<a href="{{url('abms/bancos/'.$banco->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$bancos->render()}}
	</div>
</div>

@endsection