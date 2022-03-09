@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Generar Pagos a choferes/proveedores</h3>
		@if(session('status'))
			@if(session('status')=='1')
				<div class="alert alert-success">
					Se cerro la OP!!!!		
				</div>
			@else
				<div class="alert alert-danger">
					NO CERRO LA OP!!!!
				</div>
			@endif
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nomnbre y Apellido</th>
					<th>DNI</th>
					<th>Area</th>
					<th>Sueldo Anterior</th>
					<th>Sueldo Actual</th>
					<th>Saldo</th>
					<th>Opciones</th>
					
				</thead>
               @foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->id}}</td>
					<td>{{ $dato->nombre}} {{ $dato->apellido}}</td>
					<td>{{ $dato->dni}}</td>
					<td>{{ $dato->area}}</td>
					<!-- <td>{{date("d/m/Y",strtotime($dato->fecha))  }}</td> -->
					<td class="text-right">${{number_format($dato->sueldoanterior,2,",",".")}}</td>
					<td class="text-right">${{number_format($dato->sueldoactual,2,",",".")}}</td>
					<td class="text-right">${{number_format($dato->saldo,2,",",".")}}</td>
					<td>
						<form method="post">
							<a href="{{url('pagos/empleados/'.$dato->id.'/pagar')}}"><input type="button" value="Pagar" class="btn btn-success">	</a>

							<!-- <a href="{{url('pagos/empleados/'.$dato->id.'/descuentos')}}"><input type="button" value="Descuentos" class="btn btn-success">	</a> -->

							<a href="{{url('pagos/empleados/'.$dato->id.'/historial')}}"><input type="button" value="Historial" class="btn btn-success">	</a>
						</form>
	

					</td>
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>

</div>

@endsection