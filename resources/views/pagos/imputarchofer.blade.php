@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Generar Pagos a choferes</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Numero OP</th>
					<th>Chofer/Proveedor</th>
					<th>Fecha</th>
					<th>Monto Acumulado</th>
					<th>Monto Final</th>
					<th>Estado</th>
					<th>Imputacion de instrumentos de pago</th>
				</thead>
               @foreach ($datosopchofer as $datoopchofer)
				<tr>
					<td>{{ $datoopchofer->id}}</td>
					<td>{{ $datoopchofer->numero}}</td>
					@if ($datoopchofer->proveedor_id != NULL)
						<td>{{ $datoopchofer->proveedor->nombre}}</td>
						<td>{{date("d/m/Y",strtotime($datoopchofer->fecha))  }}</td>
						<td class="text-right">${{number_format($datoopchofer->montoacumulado,2,",",".")}}</td>
						<td class="text-right">${{  number_format($datoopchofer->montofinal,2,",",".")}}</td>

						<td>{{ $datoopchofer->estado}}</td>
						<td>
						<form method="post">
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pagochequeterceroproveedor')}}"><input type="button" value="Cheque Tercero" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Cheque Tercero" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pagochequepropioproveedor')}}"><input type="button" value="Cheque Propio" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Cheque Propio" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pagoefectivoproveedor')}}"><input type="button" value="Efectivo" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Efectivo" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pagotransferenciaproveedor')}}"><input type="button" value="Transferencia" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Transferencia" class="btn btn-success">	</a>
						@endif

						@if($datoopchofer->estado=='ABIERTO')
							
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/cerrarop')}}"><input type="button" value="Cerrar OP" class="btn btn-danger" onclick="return confirm('Seguro que desea Cerrar la Orden de Pago?');">	</a>

						@else
							<a href="{{url('fletes/anticipos/'.$datoopchofer->id.'/finalizarflete')}}"><input type="button" disabled value="Cerrar OP" class="btn btn-danger">	</a>
						@endif
							<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pdf')}}"><input type="button" value="Imprimir" class="btn btn-warning">	</a>

							
					</form>
					@else
						<td>{{ $datoopchofer->chofer->apellido}}, {{ $datoopchofer->chofer->nombre}}</td>
						<td>{{ $datoopchofer->fecha}}</td>
						<td>{{ $datoopchofer->montoacumulado}}</td>
						<td>{{ $datoopchofer->montofinal}}</td>
						<td>{{ $datoopchofer->estado}}</td>
						<td>
						<form method="GET">
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagochequetercerochofer')}}"><input type="button" value="Cheque Tercero" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Cheque Tercero" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagochequepropiochofer')}}"><input type="button" value="Cheque Propio" class="btn btn-success">	</a>
						@else
							<a><input type="button" disabled value="Cheque Propio" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagoefectivochofer')}}"><input type="button" value="Efectivo" class="btn btn-success">	</a>
						@else
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagoefectivo')}}"><input type="button" disabled value="Efectivo" class="btn btn-success">	</a>
						@endif
						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagotransferenciachofer')}}"><input type="button" value="Transferencia" class="btn btn-success">	</a>
						@else
							<a ><input type="button" disabled value="Transferencia" class="btn btn-success">	</a>
						@endif

						@if($datoopchofer->estado=='ABIERTO')
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/cerraropchofer')}}"><input type="button" value="Cerrar OP" class="btn btn-danger" onclick="return confirm('Seguro que desea Cerrar la Orden de Pago?');">	</a>
						@else
							<a><input type="button" disabled value="Cerrar OP" class="btn btn-danger">	</a>
						@endif
							<a href="{{url('fletes/listarfletePdf/'.$datoopchofer->id.'/pdf')}}"><input type="button" value="Imprimir" class="btn btn-warning">	</a>
					</form>
					@endif	
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>

</div>

@endsection