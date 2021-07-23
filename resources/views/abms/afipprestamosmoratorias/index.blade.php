@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Moratorias/Planes de Pago AFIP <a href="afipprestamosmoratorias/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
	
				<!-- BUSCADOR DE aCOPLADO-->
			{!!Form::open(['route'=>'afipprestamosmoratorias.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
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
					<th>Tipo</th>
					<th>Impuesto</th>
					<th>Monto Declarado</th>
					<th>Cant. Cuotas</th>
					<th>Fecha Primera Cuota</th>
					<th>Fecha Ultima Cuota</th>
				</thead>
               @foreach ($afip_prestamos_moratorias as $afip_prestamo_moratoria)
				<tr>
					<td>{{ $afip_prestamo_moratoria->id}}</td>
					<td>{{ $afip_prestamo_moratoria->tipo}}</td>
					<td>{{ $afip_prestamo_moratoria->impuesto}}</td>
					<td>{{ $afip_prestamo_moratoria->monto_declarado}}</td>
					<td>{{ $afip_prestamo_moratoria->cant_cuotas}}</td>
					<td>{{ $afip_prestamo_moratoria->fecha_primera_cuota}}</td>
					<td>{{ $afip_prestamo_moratoria->fecha_ultima_cuota}}</td>
					<td>
					<form method="post" action="{{url('abms/afipprestamosmoratorias/'.$afip_prestamo_moratoria->id) }}">
							<a href="{{url('abms/afipprestamosmoratorias/'.$afip_prestamo_moratoria->id.'/edit')}}"><input type="button" value="Editar" class="btn btn-info">	</a>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Eliminar</button>
						</form>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$afip_prestamos_moratorias->render()}}
	</div>
</div>

@endsection
