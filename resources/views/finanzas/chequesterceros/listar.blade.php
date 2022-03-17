@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cheques de terceros <a href="/finanzas/chequesterceros/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<button class="btn btn-success" id="todos" value="todos">Mostrar Todos</button>
		
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Numero</th>
					<th>Importe</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Cliente</th>
					<th>Proveedor</th>
					<th>Banco</th>
					<th>Opciones</th>
				</thead>
               	<tbody id="tbody">
					
				</tbody>
		
			</table>
		</div>

	</div>
	<form action="POST" action="/pagos/proveedor/ajax" id="form1">
		@csrf
		<input type="hidden" name="id1" value="1">
		<input type="hidden" name="">
		
	</form>
</div>


<script>


	function tabla(){
			//			$('#ver').click(function(){
				var mostrar = $('#todos').html();

				$.ajax({
				url : "/finanzas/chequeterceros/mostrarcheques",
				type : "POST",
				data : { mostrar : mostrar,
						_token : $('input[name="_token"]').val()
						}
			}).done( function( data ){
				if( mostrar =="Mostrar Todos"){
					$('#todos').html("Mostrar Disponibles");
				}
				else{
					$('#todos').html("Mostrar Todos");
				}
				
				var tabla;
				//console.log( data.length);        
					for (var i=0; i<data.length ;i++) {
							var n=i+1;
							var proveedor="SIN ASIGNAR";
							if(data[i].proveedor_id != null){
								proveedor=data[i].proveedor.nombre;
							}
							tabla+='<tr><td>'+data[i].id+'</td><td>'+data[i].numero+'</td><td align="right">$'+data[i].importe+'</td><td>'+data[i].fecha+'</td><td>'+data[i].estado+'</td><td>'+data[i].cliente.nombre+'</td><td>'+proveedor+'</td><td>'+data[i].banco.denominacion+'</td><td><a href="/finanzas/chequesterceros/'+data[i].id+'/edit"><input type="button" value="Editar" class="btn btn-info">	</a></td></tr>';        
					}

				$('#tbody').html(tabla);
	            });
//			});
			
	
		}
	//$('#todos').click(function(){
	$(document).ready(function() {
		tabla();	
	});

	$('#todos').click(function(){
	tabla();	
	});

//	});

		
		


</script>
@endsection