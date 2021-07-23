			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nro_unidad', 'Numero de Unidad')}}
				<input type="text" class="form-control {{$errors->has('nro_unidad')?'is-invalid':''}}" name="nro_unidad" id="nro_unidad" placeholder="Numero Unidad..." value="{{old('nro_unidad')}}">

				{!! $errors->first('nro_unidad','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('dominio', 'Dominio')}}
				<input type="text" class="form-control {{$errors->has('dominio')?'is-invalid':''}}" name="dominio" id="dominio" placeholder="Dominio..." value="{{old('dominio')}}">

				{!! $errors->first('dominio','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<label for="modelo">Modelo</label>
				<input type="text" name="modelo" class="form-control {{$errors->has('modelo')?'is-invalid':''}}" placeholder="Modelo..." value="{{old('modelo')}}">
				{!! $errors->first('modelo','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="marca">Marca</label>
				<input type="text" name="marca" class="form-control {{$errors->has('marca')?'is-invalid':''}}" placeholder="Marca..." value="{{old('marca')}}">
				{!! $errors->first('marca','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="año">Año</label>
				<input type="text" name="año" class="form-control {{$errors->has('año')?'is-invalid':''}}"  placeholder="Año..." value="{{old('año')}}">
				{!! $errors->first('año','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="km">KM</label>
				<input type="text" name="km" class="form-control {{$errors->has('km')?'is-invalid':''}}" placeholder="Kilomentros..." value="{{old('km')}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="ultimoservice">Ult. Service</label>
				<input type="date" name="ultimoservice" class="form-control {{$errors->has('ultimoservice')?'is-invalid':''}}" placeholder="Ultimo Service..." value="{{old('ultimoservice')}}">
				{!! $errors->first('ultimoservice','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="proximoservicecaja">Prox. Service Caja</label>
				<input type="text" name="proximoservicecaja" class="form-control" placeholder="Proximo Service Caja..." value="{{old('proximoservicecaja')}}">
				{!! $errors->first('proximoservicecaja','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="proximoservicediferencial">Prox. Service Diferencial</label>
				<input type="text" name="proximoservicediferencial" class="form-control" placeholder="Proximo Service Diferencial..." value="{{old('proximoservicediferencial')}}">
				{!! $errors->first('proximoservicediferencial','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="proximoservicemotor">Prox. Service Motor</label>
				<input type="text" name="proximoservicemotor" class="form-control" placeholder="Proximo Service Motor..." value="{{old('proximoservicemotor')}}">
				{!! $errors->first('proximoservicemotor','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="fecha_ingreso">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso" class="form-control {{$errors->has('fecha_ingreso')?'is-invalid':''}}"  placeholder="Fecha de Ingreso..." value="{{old('fecha_ingreso')}}">
				{!! $errors->first('fecha_ingreso','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control {{$errors->has('valor')?'is-invalid':''}}"  placeholder="Valor..." value="{{old('valor')}}">
				{!! $errors->first('valor','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="amortizacion">Amortizacion Anual</label>
				<input type="text" name="amortizacion" class="form-control {{$errors->has('amortizacion')?'is-invalid':''}}"  placeholder="Amortizacion Anual..." value="{{old('amortizacion')}}">
				{!! $errors->first('amortizacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
		 	<div class="Form-group">
				<label for="foto">Foto</label>
				<input type="file" name="foto" id="foto" class="form-control" >
			</div> 

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
