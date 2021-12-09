@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Cuentas Corrientes Clientes </h3>
					<a href="../reportes/clientes"><button  class="btn btn-primary">Reporte Clientes</button></a>
					@if(session('status'))
						@if(session('status')=='1')
							<div class="alert alert-success">
								Se Guardo el Registro!!!!		
							</div>
						@else
							<div class="alert alert-danger">
								NO GUARDO EL COMPROBANTE!!!!
								
							</div>
						@endif
					@endif
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
					<th>Nombre</th>
					<th>Contacto</th>
					<th>Saldo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cliente)
				<tr>
					<td>{{ $cliente->id}}</td>
					<td>{{ $cliente->nombre}}</td>
					<td>{{ $cliente->contacto}}</td>
					@if($cliente->saldo<0)
						<td bgcolor="red" class="text-right">${{  number_format($cliente->saldo,2,",",".")}}</td>
					@else
						<td class="text-right">${{  number_format($cliente->saldo,2,",",".")}}</td>
					@endif
					<td>
					<form method="post" action="{{url('cuentascorrientes/clientes/'.$cliente->id) }}">
							<a href="{{url('cuentascorrientes/clientes/'.$cliente->id.'/nuevocomprobante')}}"><input type="button" value="Nuevo Compr." class="btn btn-info btn-sm">	</a>
							<a href="{{url('cuentascorrientes/clientes/'.$cliente->id.'/nuevaop')}}"><input type="button" value="Nueva OP" class="btn btn-info btn-sm">	</a>
							<a href="{{url('cuentascorrientes/clientes/'.$cliente->id.'/listar')}}"><input type="button" value="Comprobantes" class="btn btn-success btn-sm">	</a>
							<a href="{{url('cuentascorrientes/clientes/'.$cliente->id.'/asociar')}}"><input type="button" value="Asociar Rtos" class="btn btn-danger btn-sm">	</a>
							
					</form>
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection
