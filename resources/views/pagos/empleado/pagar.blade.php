@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h2>Pago a Empleado</h2>
			@foreach ($empleados as $empleado)
				<h3>Empleado: {{$empleado->nombre}} {{$empleado->apellido}}  -  Area: {{$empleado->area}}  -  Sueldo: $ {{$empleado->sueldoactual}}</h3>
			@endforeach
			<h2>Informacion del Ultimo Pago</h2>
			@foreach ($ultimopago as $ultimopagos)
				<h3>Fecha: {{$ultimopagos->fecha}}  -  Monto: {{$ultimopagos->monto}}  -  Periodo: {{$ultimopagos->mes}}/{{$ultimopagos->año}}</h3>
				
			@endforeach
			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
			{!!Form::open(['route' => ['guardarpago',$id],'method'=>'POST','class'=>'submit-prevent-form'])!!}
			<div class="Form-group">
				
				<input type="hidden" name="id" class="form-control {{$errors->has('id')?'is-invalid':''}}" value="{{$id}}" >
				{!! $errors->first('id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<table>
					<tr>

						<td>
							<label for="mes"> Mes de Pago</label>
							<select name="mes" id="tipo" class="form-control">
										<option value="">Selecccione el mes de pago</option>
										<option value="ENERO">ENERO</option>
										<option value="FEBRERO">FEBRERO</option>
										<option value="MARZO">MARZO</option>
										<option value="ABRIL">ABRIL</option>
										<option value="MAYO">MAYO</option>
										<option value="JUNIO">JUNIO</option>
										<option value="JULIO">JULIO</option>
										<option value="AGOSTO">AGOSTO</option>
										<option value="SEPTIEMBRE">SEPTIEMBRE</option>
										<option value="OCTUBRE">OCTUBRE</option>
										<option value="NOVIEMBRE">NOVIEMBRE</option>
										<option value="DICIEMBRE">DICIEMBRE</option>

							</select>
						</td>
						<td>&nbsp;</td>
						<td>
							<label for="año"> Año de  Pago</label>
							<select name="año" id="tipo" class="form-control">
										<option value="">Selecccione el año de pago</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										
							</select>
						</td>
					</tr>
				</table>
			</div>

			<div class="Form-group">
				<label for="monto">Monto</label>
				<input type="number" step=0.01 name="monto" class="form-control {{$errors->has('monto')?'is-invalid':''}}" placeholder="Monto..." value="{{old('monto')}}">
				{!! $errors->first('monto','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div>
				<td>
							<label for="forma"> Forma de Pago</label>
							<select name="forma" id="tipo" class="form-control">
										<option value="">Selecccione el forma de pago</option>
										<option value="Transferencia">Transferencia</option>
										<option value="Efectivo">Efectivo</option>
										<option value="Cheque">Cheque</option>
							</select>
						</td>
			</div>
			<div class="Form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" value="{{old('observacion')}}"> 
				{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<!-- <div class="Form-group">
				<label for="fechaemision">Fecha Emision</label>
				<input type="date" name="fechaemision" id="fechaemision" class="form-control {{$errors->has('fechaemision')?'is-invalid':''}}" placeholder="Fecha de emision..." value="{{old('fechaemision')}}">
				{!! $errors->first('fechaemision','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fechavencimiento">Fecha Vencimiento</label>
				<input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control {{$errors->has('fechavencimiento')?'is-invalid':''}}" placeholder="Fecha de vencimiento..." value="{{old('fechavencimiento')}}">
				{!! $errors->first('fechavencimiento','<div class="invalid-feedback">:message</div>')!!}
			</div>
			
			<div class="Form-group">
					<label for="importesubtotal">Importe SubTotal</label>
					<input type="number" step=0.01 name="importesubtotal" class="form-control {{$errors->has('importesubtotal')?'is-invalid':''}}" placeholder="Importe Subtotal ..." value="{{old('importesubtotal')}}">
					{!! $errors->first('importesubtotal','<div class="invalid-feedback">:message</div>')!!}
				</div>
			<div class="Form-group">
				<label for="iva">IVA</label>
				<input type="number" step=0.01 name="iva" class="form-control {{$errors->has('iva')?'is-invalid':''}}" placeholder="IVA ..." value="{{old('iva')}}">
				{!! $errors->first('iva','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="percepcioniva">Percepcion IVA</label>
				<input type="number" step=0.01 name="percepcioniva" class="form-control {{$errors->has('iva')?'is-invalid':''}}" placeholder="Percepcion IVA ..." value="{{old('percepcioniva')}}">
				{!! $errors->first('percepcioniva','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="ingresobruto">Ingreso Bruto</label>
				<input type="number" step=0.01 name="ingresobruto" class="form-control {{$errors->has('ingresobruto')?'is-invalid':''}}" placeholder="Ingreso Bruto ..." value="{{old('ingresobruto')}}">
				{!! $errors->first('ingresobruto','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="tem">TEM</label>
				<input type="number" step=0.01 name="tem" class="form-control {{$errors->has('tem')?'is-invalid':''}}" placeholder="TEM ..." value="{{old('tem')}}">
				{!! $errors->first('tem','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="ganancia">Ganancia</label>
				<input type="number" step=0.01 name="ganancia" class="form-control {{$errors->has('ganancia')?'is-invalid':''}}" placeholder="Ganancia ..." value="{{old('ganancia')}}">
				{!! $errors->first('ganancia','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
					<label for="importefinal">Importe Final</label>
					<input type="number" step=0.01 name="importefinal" class="form-control {{$errors->has('importefinal')?'is-invalid':''}}" placeholder="Importe Final ..." value="{{old('importefinal')}}">
					{!! $errors->first('importefinal','<div class="invalid-feedback">:message</div>')!!}
				</div>
 -->
			
			
			<br>
	<div class="Form-group">
				<button class="btn btn-primary submit-prevent-button" type="submit"><i class="spinner fa fa-spinner fa-spin"></i>Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/pagos/empleados/listar"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection