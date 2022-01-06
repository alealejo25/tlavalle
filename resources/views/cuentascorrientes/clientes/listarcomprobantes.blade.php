@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Listado de Comprobantes - Cliente:  @foreach ($cliente as $clientes){{$clientes->nombre}} 				@endforeach
	</h3>
				</div>
		
			<!-- BUSCADOR DE CLIENTE-->
			{!!Form::open(['route'=>'clientes.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
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
					<th>Tipo Comprob.</th>
					<th>Nro Comprob.</th>
					<th>Fec. Emision</th>
					<th>Subtotal</th>
					<th>IVA</th>
					<th>Exento</th>
					<th>ImpFinal</th>
					<th>Debe</th>
					<th>Haber</th>
					<th>Acumulado</th>
					<th>Observacion</th>
					<th>Estado</th>

				</thead>
               @foreach ($cuentacorrientecliente as $cliente)
				<tr>
					<td>{{ $cliente->id}}</td>
					<td>{{ $cliente->tipocomprobante}}</td>
					<td>{{ $cliente->nrocomprobante}}</td>
					<td>{{date("d/m/Y",strtotime($cliente->fechaemision))}}</td>
					<!-- <td>{{date("d/m/Y",strtotime($cliente->fechavencimiento)) }}</td> -->
					<td  class="text-right">${{  number_format($cliente->importesubtotal,2,",",".")}}</td>
					<td  class="text-right">${{  number_format($cliente->iva,2,",",".")}}</td>
					<td  class="text-right">${{  number_format($cliente->exento,2,",",".")}}</td>
					<td  class="text-right">${{  number_format($cliente->importefinal,2,",",".")}}</td>
					<td class="text-right">${{  number_format($cliente->debe,2,",",".")}}</td>
					<td  class="text-right">${{  number_format($cliente->haber,2,",",".")}}</td>
					@if($cliente->acumulado<0)
						<td bgcolor="red" class="text-right">${{  number_format($cliente->acumulado,2,",",".")}}</td>
					@else
						<td class="text-right">${{  number_format($cliente->acumulado,2,",",".")}}</td>
					@endif
					<td>{{ $cliente->observacion}}</td>
					<td>
						<form method="get" class="submit-prevent-form" action="{{url('cuentascorrientes/clientes/'.$cliente->id.'/anular') }}">

								
							@if($cliente->estado =='')
								<button class="btn btn-primary submit-prevent-button" type="submit"><i class="spinner fa fa-spinner fa-spin"></i>Anular</button>
							@endif
					</form> 
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$cuentacorrientecliente->render()}}
	</div>
</div>

@endsection
