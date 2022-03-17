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
					<input type="text" name="id" id="id" hidden value="{{$datoopchofer->id}}">
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
						<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pagosproveedor')}}"><input type="button" value="pagos" class="btn btn-success">	</a>
						<a href="{{url('pagos/proveedor/'.$datoopchofer->id.'/pdf')}}"><input type="button" value="Imprimir" class="btn btn-warning">	</a>

							


					</form>

					@if($datoopchofer->estado=='ABIERTO')
					<form method="get" class="submit-prevent-form" action="{{url('pagos/proveedor/'.$datoopchofer->id.'/cerrarop') }}">

							<button class="btn btn-primary submit-prevent-button" type="submit" onclick="return confirm('Seguro que desea Cerrar la Orden de Pago?');"><i class="spinner fa fa-spinner fa-spin" ></i>Cerrar OP</button>
					</form> 
					@endif
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
							<a href="{{url('pagos/chofer/'.$datoopchofer->id.'/pagos')}}"><input type="button" value="pagos" class="btn btn-success">	</a>
							<a href="{{url('fletes/listarfletePdf/'.$datoopchofer->id.'/pdf')}}"><input type="button" value="Imprimir" class="btn btn-warning">	</a>
					</form>
					@endif	
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
	<input type="button" name="ver" id="ver" value="ver">
	<form action="POST" action="/pagos/proveedor/ajax" id="form1">
		@csrf
		<input type="hidden" name="id1" value="1">
		<input type="hidden" name="">
		
	</form>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Pagos Generados</h3>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nro</th>
					<th>Nro Instrumento</th>
					<th>Importe</th>
					<th>Forma</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</thead>
				<tbody id="tbody">
					
				</tbody>
		</table>
</div>
	</div>
</div>
<script>
	function borrarregistro(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("/pagos/proveedor/ajax/borrar", {
                id: id,
                _token : $('input[name="_token"]').val()
            },
            function (data, status) {
                // reload Users by using readRecords();
                tabla();
            }
        );
    }
}
//	$(document).ready(function(){


		function tabla(){
			
		//			$('#ver').click(function(){
				$.ajax({
				url : "/pagos/proveedor/ajax",
				type : "POST",
				data : { id : $("#id").val(),
						_token : $('input[name="_token"]').val()
						}
			}).done( function( data ){
				var tabla;
				//console.log( data.length);        
					for (var i=0; i<data.length ;i++) {
							var n=i+1;
							tabla+='<tr><td>'+n+'</td><td>'+data[i].nroinstrumento+'</td><td>'+data[i].importe+'</td><td>'+data[i].forma+'</td><td>'+data[i].fecha+'</td><td><button class="btn btn-warning" onclick="borrarregistro('+data[i].id+')">borrar</button></td></tr>';        
					}
				$('#tbody').html(tabla);
	            });
//			});
			
	
		}
	$('#ver').click(function(){

		tabla();	
		
				
	});

	
	

//	});

		
		


</script>
@endsection