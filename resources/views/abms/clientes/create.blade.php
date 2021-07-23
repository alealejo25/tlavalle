@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Nuevo Registro de Cliente</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'abms/clientes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
			{{Form::token()}}
			
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('nombre', 'Nombre')}}
				<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" placeholder="Nombre..." name="nombre" id="nombre"  value="{{old('nombre')}}">
				{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('direccion', 'Direccion')}}
				<input type="text" class="form-control {{$errors->has('direccion')?'is-invalid':''}}" placeholder="Direccion..." name="direccion" id="direccion"  value="{{old('direccion')}}">
				{!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<label for="provincia">Provincia</label>
				{!!Form::select('provincia',$provincias,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('localidad', 'Localidad')}}
				<input type="text" class="form-control {{$errors->has('localidad')?'is-invalid':''}}" placeholder="Localidad..." name="localidad" id="localidad"  value="{{old('localidad')}}">
				{!! $errors->first('localidad','<div class="invalid-feedback">:message</div>')!!}

			</div>

			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('telefono', 'Telefono')}}
				<input type="text" class="form-control {{$errors->has('telefono')?'is-invalid':''}}" placeholder="Telefono..." name="telefono" id="telefono"  value="{{old('telefono')}}">
				{!! $errors->first('telefono','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('email1', 'Email')}}
				<input type="email1" class="form-control {{$errors->has('email1')?'is-invalid':''}}" placeholder="Email..." name="email1" id="email1"  value="{{old('email1')}}">
				{!! $errors->first('email1','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('email2', 'Email (Opcional)')}}
				<input type="email2" class="form-control {{$errors->has('email2')?'is-invalid':''}}" placeholder="Email..." name="email2" id="email2"  value="{{old('email2')}}">
				{!! $errors->first('email2','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				{{Form::label('email3', 'Email (Opcional)')}}
				<input type="email3" class="form-control {{$errors->has('email3')?'is-invalid':''}}" placeholder="Email..." name="email3" id="email3"  value="{{old('email3')}}">
				{!! $errors->first('email3','<div class="invalid-feedback">:message</div>')!!}

			</div>
				<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('contacto', 'Contacto')}}
				<input type="text" class="form-control {{$errors->has('contacto')?'is-invalid':''}}" placeholder="Contacto..." name="contacto" id="contacto"  value="{{old('contacto')}}">
				{!! $errors->first('contacto','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('telefono_contacto', 'Telefono de Contacto')}}
				<input type="text" class="form-control {{$errors->has('telefono_contacto')?'is-invalid':''}}" placeholder="Telefono de Contacto..." name="telefono_contacto" id="telefono_contacto"  value="{{old('telefono_contacto')}}">
				{!! $errors->first('telefono_contacto','<div class="invalid-feedback">:message</div>')!!}

			</div>
						<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('cuit', 'Cuit')}}
				<input type="text" class="form-control {{$errors->has('cuit')?'is-invalid':''}}" placeholder="Cuit..." name="cuit" id="cuit"  value="{{old('cuit')}}">
				{!! $errors->first('cuit','<div class="invalid-feedback">:message</div>')!!}

			</div>
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('saldo', 'Saldo')}}
				<input type="text" class="form-control {{$errors->has('saldo')?'is-invalid':''}}" placeholder="Saldo..." name="saldo" id="saldo"  value="{{old('saldo')}}">
				{!! $errors->first('saldo','<div class="invalid-feedback">:message</div>')!!}
				
			</div>
			
			<div class="Form-group">
				<label for="tipo">Selecccione si es cliente de Pallet</label>
				<select name="clientepallet" id="clientepallet" class="form-control">
							<option value="">Selecccione si es cliente de Pallet<</option>
							<option value="SI">SI</option>
							<option value="NO">NO</option>
				</select>
			</div>
			
			<div class="Form-group">
				<!-- <label for="nombre">Dominio</label> -->
				{{Form::label('saldopallet', 'Saldo Pallet')}}
				<input type="text" class="form-control {{$errors->has('saldopallet')?'is-invalid':''}}" placeholder="Saldo Pallet..." name="saldopallet" id="saldopallet"  value="{{old('saldopallet')}}">
				{!! $errors->first('saldopallet','<div class="invalid-feedback">:message</div>')!!}
				
			</div>

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/clientes"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection