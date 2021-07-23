@extends('layouts.admin')
@section('contenido')
@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="text-center">
		<h3>Ingreso y Egreso de Articulos</h3>
	</div>
</div>
<form action="/movimientos/articulos" method="post">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<h4>1. Datos del Comprobante</h4>
			<div class="card">
				<div class="row">
					<div class="Form-group col-lg-12" >

						{{Form::label('nro_comprobante', 'Nro. de Comprobante')}}
						<input type="text" class="form-control {{$errors->has('nro_comprobante')?'is-invalid':''}}" placeholder="Numero de comprobante..." name="nro_comprobante" id="nro_comprobante"  value="{{old('nro_comprobante')}}">
						{!! $errors->first('nro_comprobante','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="Form-group col-lg-12" >
						{{Form::label('clientes', 'Cliente')}}
						<select name="cliente_id" id="cliente" class="form-control">
							<option value="">Selecccione un cliente</option>
							@foreach ($clientes as $cliente) 
								<option value="{{ $cliente->id }}">{{$cliente->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="Form-group col-lg-12">
						<label for="">Chofer</label>
						<select name="chofer_id" id="chofer" class="form-control">
							<option value="">Selecccione un chofer</option>
							@foreach ($choferes as $chofer) 
								<option value="{{ $chofer->id }}">{{$chofer->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="Form-group col-lg-12" >
						{{Form::label('receptor_mercaderia', 'Receptor de Mercaderia')}}
						<input type="text" class="form-control {{$errors->has('receptor_mercaderia')?'is-invalid':''}}" placeholder="Receptor de Mercaderia..." name="receptor_mercaderia" id="receptor_mercaderia"  value="{{old('receptor_mercaderia')}}">
						{!! $errors->first('receptor_mercaderia','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="Form-group col-lg-6" >
						{{Form::label('tipo', 'Tipo')}}
						<select name="tipo" id="tipo" class="form-control">
							<option value="">Selecccione un cliente</option>
							<option value="Egreso">EGRESO</option>
							<option value="Ingreso">INGRESO</option>
						</select>
					</div>
					<div class="Form-group col-lg-6">
						<label for="fechanac">Fecha del Comprobante</label>
						<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha..." value="{{old('fechanac')}}">
						{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
					</div>
				</div>	
			</div>

		<br>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success btn-block">Guardar</button>	
		</div>
		</div>
		<div class="col-lg-6">
			<h4>2. Agregar Articulos</h4>
			<div class="card">
				<div class="row">
					<div class="Form-group col-lg-12" >
						<label for="">Articulo</label>
						<select name="articulo_id" id="articulo" class="form-control" onchange="colocar_cantidad(this)">
							<option value="">Selecccione un Articulo</option>
							@foreach ($articulos as $articulo) 
								<option cantidad="{{$articulo->cantidad}}" value="{{ $articulo->id }}">{{ $articulo->nombre }}</option>
							@endforeach
						</select>
					</div>
			
					<div class="form-group col-lg-6" >
						{{Form::label('cantidad', 'Cantidad')}}
						<input type="number" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" placeholder="Ingrese Cantidad..." name="cantidad" id="cantidad"  value="{{old('cantidad')}}">
						{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="form-group col-lg-3" >
						{{Form::label('cantidadact', 'Cantidad Actual')}}
						<input type="text" class="form-control {{$errors->has('cantidadact')?'is-invalid':''}}" disabled name="cantidadact" id="cantidadact"  value="{{old('cantidadact')}}">
						{!! $errors->first('cantidadact','<div class="invalid-feedback">:message</div>')!!}
					</div>
					<div class="form-group col-lg-6">
						<button onclick="agregar_articulo()" type="button" class="btn btn-success float-right">Agregar</button>
					</div>

				</div>	
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Articulo</th>
						<th>Cantidad</th>
						<th>Opciones</th>
					</thead>
					<tbody id="tblArticulo">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</form>


@endsection

@section("script")
	<script >
		function colocar_cantidad(){
			let cantidad= $("#articulo option:selected").attr("cantidad");
			$("#cantidadact").val(cantidad);
		}

		function agregar_articulo(){
			let articulo_id=$("#articulo option:selected").val();
			let articulo_name=$("#articulo option:selected").text();
			let cantidad=$("#cantidad").val();

			
			if (cantidad>0) {
				$("#tblArticulo").append(`
					<tr id="tr-${articulo_id}">
						<td>
							<input type="hidden" name="articulo_id[]" value="${articulo_id}"/>
							<input type="hidden" name="cantidad[]" value="${cantidad}"/>
							${articulo_id}
						</td>
						<td>${articulo_name}</td>
						<td>${cantidad}</td>
						<td>
							<button type="button" class="btn btn-danger float-right" onclick="eliminar_articulo(${articulo_id})">X</button>
						</td>
					</tr>
				`);	
			}else{
				alert("La cantidad debe ser mayor a CERO!!!!");
			}

		}

		function eliminar_articulo(id){
			$("#tr-"+id).remove();
		}

	</script>

@endsection

