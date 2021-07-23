@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive ">
			<form action="{{url('fletes/listaranticipoPdf/'.$datoanticipo->id.'/pdf') }}">
			{{csrf_field()}}
				<button type="submit" class="btn btn-danger">  PDF Anticipo</button>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive ">
			<table class="table table-striped table-bordered table-condensed table-hover">
				@foreach ($datoflete as $flete)
				<tr>
					<h3>Datos del Flete</h3>
					<h4>Nro Remito Flete: {{ $flete->nroremito}}</h4>
					<h4>Descripcion de la Vuelta: {{ $flete->descripciontarifa}}</h4>
					<h4>Fecha: {{ $flete->fechaincio}}</h4>
					<h3>Datos del Chofer</h3>
					<h4>Chofer: {{ $flete->chofer->apellido}}, {{$flete->chofer->nombre}}</h4>

					<h3>Datos del Camion</h3>
					<h4>Dominio: {{ $flete->camion->dominio}}</h4>
					<h4>Nro Unidad: {{ $flete->camion->nro_unidad}}</h4>
					<h4>Km Inicio: {{ $flete->kminicio}}</h4>
				</tr>
				@endforeach
				<tr>
					<h3>Datos del Anticipo</h3>
					<h4>Nro de Remito Anticipo: {{ $datoanticipo->nroremito}}</h4>
					<h4>Anticipo: $ {{ $datoanticipo->importe}}</h4>

					
				</tr>

			</table>
		</div>

	</div>
	
</div>


@endsection