@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Mantenimientos de prestamoes</h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Remito</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Importe</th>
					<th>Importe Restante</th>
					<th>Valor de cuota</th>
					<th>Mes Proximo Pago</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($prestamos as $prestamo)
				<tr>
					<td>{{ $prestamo->id}}</td>
					<td>{{ $prestamo->nroremito}}</td>
					<td>{{ $prestamo->chofer->nombre}}</td>
					<td>{{ $prestamo->descripcion}}</td>
					<td>{{ $prestamo->importe}}</td>
					<td>{{ $prestamo->importerestante}}</td>
					<td>{{ $prestamo->valorcuota}}</td>
					<td>{{ $prestamo->fechaproximopago}}</td>
					<td>{{ $prestamo->estado}}</td>

					<td>
						<form method="post" action="{{url('pagos/'.$prestamo->id) }}">
							<a href="{{url('pagos/'.$prestamo->id.'/saldarcuota')}}" ><input type="button" onclick="return confirm('Seguro que desea saldar una cuota?');" value="Saldar Cuota" class="btn btn-success">	</a>
							<a href="{{url('pagos/'.$prestamo->id.'/saldartotal')}}"><input type="button" value="Saldar Total" class="btn btn-info">	</a>
								{{csrf_field()}}
								{{method_field('DELETE')}}
							<button type="submit" onclick="return confirm('Seguro que desea Borrar?');" class="btn btn-danger">Reporte</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$prestamos->render()}}
	</div>
</div>

@endsection