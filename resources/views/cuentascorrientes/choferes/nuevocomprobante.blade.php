@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">

			@foreach ($choferes as $chofer)
			<h3>Ingreso de comprobante</h3>
			<h4>Proveedor: {{$chofer->nombre}}</h4>
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
			{!!Form::open(['route' => ['guardarcomprobantecho',$id],'method'=>'POST'])!!}
			<div class="Form-group">
				<table>
					<tr>

						<td>
							<label for="tipocomprobante"> Tipo de Comprobante</label>
							<select name="tipocomprobante" id="tipo" class="form-control">
										<option value="">Selecccione un Tipo Comprobante</option>
										<option value="FACTURA">FACTURA</option>
										<option value="REMITO">REMITO</option>
										<option value="NOTA DE CREDITO">NOTA DE CREDITO</option>
										<option value="NOTA DE DEBITO">NOTA DE DEBITO</option>
										<option value="RECIBO">RECIBO</option>
							</select>
						</td>
						<td>&nbsp;</td>
						<td>
							<label for="nrocomprobante">Numero de Comprobante</label>
							<input type="text" name="nrocomprobante" class="form-control {{$errors->has('nrocomprobante')?'is-invalid':''}}" value="{{old('nrocomprobante')}}">
							{!! $errors->first('nrocomprobante','<div class="invalid-feedback">:message</div>')!!}
						</td>
					</tr>
				</table>
			</div>


			<div class="Form-group">
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
				<label for="importe">Importe</label>
				<input type="number" step=0.01 name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" placeholder="Importe..." value="{{old('importe')}}">
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
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

			<div class="Form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" value="{{old('observacion')}}"> 
				{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div>
				<label for="factura_id">Factura asociada a la ND o NC</label>
				{!!Form::select('factura_id',$cuentacorrientechofer,null,['class' => 'form-control','placeholder'=>'Seleccione Factura asociada a la ND o NC','requerid' ])!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/cuentascorrientes/clientes"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection