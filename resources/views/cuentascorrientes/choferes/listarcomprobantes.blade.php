@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Listado de Comprobantes - Choferes: @foreach ($chofer as $choferes){{$choferes->nombre}}
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
					<th>Tipo de Comprobante</th>
					<th>Nro Comprobante</th>
					<th>Fecha Vencimiento</th>
					<th>Debe</th>
					<th>Haber</th>
					<th>Acumulado</th>
					<th>Estado</th>

				</thead>
               @foreach ($cuentacorrientechofer as $chofer)
				<tr>
					<td>{{ $chofer->id}}</td>
					<td>{{ $chofer->tipocomprobante}}</td>
					<td>{{ $chofer->nrocomprobante}}</td>
					<td>{{ $chofer->fechavencimiento}}</td>
					<td>{{ $chofer->debe}}</td>
					<td>{{ $chofer->haber}}</td>
					<td>{{ $chofer->acumulado}}</td>
					<td>{{ $chofer->estado}}</td>
					
					
					<td>
			
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$cuentacorrientechofer->render()}}
	</div>
</div>

@endsection