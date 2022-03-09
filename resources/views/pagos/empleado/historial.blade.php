@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Pago a Empleados: @foreach ($empleados as $dato){{$dato->nombre}}, {{$dato->apellido}} - Fecha Ingreso: {{date("d/m/Y",strtotime($dato->fechaingreso))}}
					<a href="{{url('pagos/empleados/'.$dato->id.'/reportepagos')}}"><input type="button" value="Reporte PDF" class="btn btn-success">	</a>
					
					@endforeach</h3>
				</div>
		
			<!-- BUSCADOR DE CLIENTE-->
			{!!Form::open(['route'=>'choferes.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Chofer..','aria-describedby'=>'search'])!!}
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
					<th>Nro Comprob.</th>
					<th>Fec. Pago</th>
					<th>Monto</th>
					<th>Mes</th>
					<th>Año</th>
					<th>Forma</th>
					<th>Observacion</th>
					<th>Opciones</th>

				</thead>
               @foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->id}}</td>
					<td>{{ $dato->nrocomprobante}}</td>
					<td>{{date("d/m/Y",strtotime($dato->fecha))  }}</td>
					<td class="text-right">${{  number_format($dato->monto,2,",",".")}}</td>
					<td>{{ $dato->mes}}</td>
					<td>{{ $dato->año}}</td>
					<td>{{ $dato->forma}}</td>
					<td>{{ $dato->observacion}}</td>
					<td>
						<form method="post">
							<a href="{{url('pagos/empleados/'.$dato->id.'/editar')}}"><input type="button" value="Editar" class="btn btn-success">	</a>
							<a href="{{url('pagos/empleados/'.$dato->id.'/eliminar')}}"><input type="button" value="Eliminar" class="btn btn-danger">	</a>
						</form>
	

					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		<div class="Form-group">
			<br/>
			<a href="/pagos/empleados/listar"><button class="btn btn-success">Regresar</button></a>
		</div>
	</div>
</div>

@endsection