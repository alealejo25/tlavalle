@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-lg-8 col-lg-8 col-xs-12">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Mantenimiento Camiones 			<a href="/mantenimientos/listarcamion"><button class="btn btn-success">Ver Mantenimientos</button></a></h3>
					
				</div>
			</div>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 		<!--	{!!Form::open(array('url'=>'guardartransferencia','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} -->
				{!!Form::open(['route' => 'guardarcamion','method'=>'POST'])!!}
			{{Form::token()}}

<!-- 						<form action="/movimientos/articulos" method="post"> -->
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<h4>1. Datos</h4>
						<div class="card">
							<div class="row">
								<div class="Form-group col-lg-12" >
									<label for="camion_id">Seleccione Camion a relizar mantenimiento</label>
									{!!Form::select('camion_id',$camiones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
								</div>
								<div class="Form-group col-lg-12">
									<label for="observacion">Descripcion de la mano de obra</label>
									<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" placeholder="Ingrese la descripcion de la mano de obra ..." value="{{old('observacion')}}">
									{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
								</div>
								<div class="Form-group col-lg-12" >
									<label for="fecha">Fecha de Inicio del Mantenimiento</label>
									<input type="date" name="fechainicio" id="fechainicio" class="form-control {{$errors->has('fechainicio')?'is-invalid':''}}" placeholder="Fecha Inicio del Mantenimiento..." value="{{old('fechainicio')}}">
									{!! $errors->first('fechainicio','<div class="invalid-feedback">:message</div>')!!}
								</div>
							</div>	
						</div>

					<br>
					<div class="col-lg-12">
						<button type="submit" class="btn btn-success btn-block">Guardar</button>	
					</div>
					</div>
					<div class="col-lg-6">
						<h4>2. Agregar Repuestos</h4>
						<div class="card">
							<div class="row">
								<div class="Form-group col-lg-12" >
									<label for="">Repuestos</label>
									<select name="repuesto_id" id="repuesto" class="form-control" onchange="colocar_cantidad(this)">
										<option value="">Selecccione un Repuesto</option>
										@foreach ($repuestos as $repuesto) 
											<option cantidad="{{$repuesto->cantidad}}" value="{{ $repuesto->id }}">{{$repuesto->codigo}} - {{$repuesto->nombre}}</option>
										@endforeach
									</select>

								</div>
								<div class="form-group col-lg-6" >
									{{Form::label('cantidad', 'Cantidad')}}
									<input type="number" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" placeholder="Ingrese Cantidad..." name="cantidad" id="cantidad"  value="{{old('cantidad')}}">
									{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
								</div>
								<div class="form-group col-lg-4" >
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
									<th>Respuesto</th>
									<th>Cantidad</th>
									<th>Opciones</th>
								</thead>
								<tbody id="tblArticulo">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
<!-- 			</form> -->


			
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/mantenimientos/camion"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection

@section("script")
	<script >
		function colocar_cantidad(){
			let cantidad= $("#repuesto option:selected").attr("cantidad");
			$("#cantidadact").val(cantidad);
		}

		function agregar_articulo(){
			let repuesto_id=$("#repuesto option:selected").val();
			let repuesto_name=$("#repuesto option:selected").text();
			let cantidad=$("#cantidad").val();

			
			if (cantidad>0) {
				$("#tblArticulo").append(`
					<tr id="tr-${repuesto_id}">
						<td>
							<input type="hidden" name="repuesto_id[]" value="${repuesto_id}"/>
							<input type="hidden" name="cantidad[]" value="${cantidad}"/>
							${repuesto_id}
						</td>
						<td>${repuesto_name}</td>
						<td>${cantidad}</td>
						<td>
							<button type="button" class="btn btn-danger float-right" onclick="eliminar_articulo(${repuesto_id})">X</button>
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
