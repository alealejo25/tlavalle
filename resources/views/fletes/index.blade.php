@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="text-center">
		<h3>Listar Movimientos</h3>
		@if(session('status'))
			@if(session('status')=='1')
				<div class="alert alert-success">
					Se Guardo el Registro!!!!		
				</div>
			@else
				<div class="alert alert-danger">
					NO GUARDO LA FINALIZACION DEL FLETE!!!!
					
				</div>
			@endif
		@endif
	</div>
</div
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Fletes <a href="fletes/create"><button class="btn btn-success">Iniciar Flete</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive ">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Chofer</th>
					<th>Camion</th>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($fletes as $flete)
				<tr>
					<td>{{ $flete->id}}</td>
					<td>{{ $flete->chofer->nombre}}</td>
					<td>{{ $flete->camion->dominio}}</td>
					<td>{{ $flete->fechainicio}}</td>
					<td>{{ $flete->descripciontarifa}}</td>
					<td>{{ $flete->estado}}</td>
					<td>
					<form method="post">
					<!-- 	@if($flete->estado=='INICIADO')
							<a href="{{url('fletes/vales/'.$flete->id.'/editarvales')}}"><input type="button" value="Vales" class="btn btn-success">	</a>
						@else
							<a href="{{url('fletes/vales/'.$flete->id.'/editarvales')}}"><input type="button" disabled value="Vales" class="btn btn-success">	</a>
						@endif -->
						@if($flete->estado=='INICIADO')
							<a href="{{url('fletes/'.$flete->id.'/finalizarflete')}}"><input type="button" value="Finalizar" class="btn btn-success">	</a>
							<a href="{{url('fletes/anticipos/'.$flete->id.'/nuevoanticipo')}}"><input type="button"  value="Nuevo Anticipo" class="btn btn-success">	</a>
						@else
							<a href="{{url('fletes/anticipos/'.$flete->id.'/finalizarflete')}}"><input type="button" disabled value="Finalizar" class="btn btn-success">	</a>
							<a href="{{url('fletes/anticipos/'.$flete->id.'/nuevoanticipo')}}"><input type="button" disabled value="Nuevo Anticipo" class="btn btn-success">	</a>
						@endif

						<a href="{{url('fletes/'.$flete->id.'/cancelarflete')}}"><input type="button" value="Cancelar" class="btn btn-danger">	</a>
						
							<a href="{{url('fletes/listarfletePdf/'.$flete->id.'/pdf')}}"><input type="button" value="Imprimir" class="btn btn-warning">	</a>
					</form>


					</td>
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$fletes->render()}}
	</div>
	
</div>

@endsection