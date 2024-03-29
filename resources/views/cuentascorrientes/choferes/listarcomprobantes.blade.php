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
					<th>Tipo Comprob.</th>
					<th>Nro Comprob.</th>
					<th>Fec. Emision</th>
					<th>Fec. Venc.</th>
					<th>Debe</th>
					<th>Haber</th>
					<th>Acumulado</th>
					<th>Observaciones</th>
					<th>Estado</th>

				</thead>
               @foreach ($cuentacorrientechofer as $chofer)
				<tr>
					<td>{{ $chofer->id}}</td>
					<td>{{ $chofer->tipocomprobante}}</td>
					<td>{{ $chofer->nrocomprobante}}</td>
					<td>{{date("d/m/Y",strtotime($chofer->fechaemision))  }}</td>
					<td>{{date("d/m/Y",strtotime($chofer->fechavencimiento))  }}</td>
					<td class="text-right">${{  number_format($chofer->debe,2,",",".")}}</td>
					<td  class="text-right">${{  number_format($chofer->haber,2,",",".")}}</td>
					@if($chofer->acumulado<0)
						<td bgcolor="red" class="text-right">${{  number_format($chofer->acumulado,2,",",".")}}</td>
					@else
						<td class="text-right">${{  number_format($chofer->acumulado,2,",",".")}}</td>
					@endif
					<td>{{ $chofer->observacion}}</td>
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