@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">

			@foreach ($clientes as $cliente)
			<h3>Ingreso de comprobante</h3>
			<h4>Cliente: {{$cliente->nombre}}</h4>
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
 			<!-- {!!Form::open(array('url'=>'fletes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}  -->
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->
			{!!Form::open(['route' => ['guardaropc',$id],'method'=>'POST'])!!}
			<div class="Form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" placeholder="Fecha ..." value="{{old('fecha')}}">
				{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="nrocomprobante">Numero de Comprobante</label>
				<input type="text" name="nrocomprobante" class="form-control {{$errors->has('nrocomprobante')?'is-invalid':''}}" value="{{old('nrocomprobante')}}">
				{!! $errors->first('nrocomprobante','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="montoneto">Monto Neto</label>
				<input type="number" step=0.01 name="montoneto" class="form-control {{$errors->has('montoneto')?'is-invalid':''}}" placeholder="Monto Neto..." value="{{old('montoneto')}}">
				{!! $errors->first('montoneto','<div class="invalid-feedback">:message</div>')!!}
			</div>

			<div class="Form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value="{{old('descripcion')}}"> 
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>


			<div class="Form-group">
				<label for="provincia1">Provincia TEM</label>
				{!!Form::select('provincia1',$provincias,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="ingresobrutos1">Ingreso Bruto 1</label>
				<input type="number" step=0.01 name="ingresobrutos1" class="form-control {{$errors->has('ingresobrutos1')?'is-invalid':''}}" placeholder="Ingreso Bruto..." value="{{old('ingresobrutos1')}}">
				{!! $errors->first('ingresobruto1','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="provincia2">Provincia TEM</label>
				{!!Form::select('provincia2',$provincias,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="ingresobrutos2">Ingreso Bruto 2</label>
				<input type="number" step=0.01 name="ingresobrutos2" class="form-control {{$errors->has('ingresobrutos2')?'is-invalid':''}}" placeholder="Ingreso Bruto..." value="{{old('ingresobrutos2')}}">
				{!! $errors->first('ingresobrutos2','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="provincia3">Provincia TEM</label>
				{!!Form::select('provincia3',$provincias,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="ingresobrutos3">Ingreso Bruto 3</label>
				<input type="number" step=0.01 name="ingresobrutos3" class="form-control {{$errors->has('ingresobrutos3')?'is-invalid':''}}" placeholder="Ingreso Bruto..." value="{{old('ingresobrutos3')}}">
				{!! $errors->first('ingresobrutos3','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="retencionganancias">Retencion Ganancias</label>
				<input type="number" step=0.01 name="retencionganancias" class="form-control {{$errors->has('retencionganancias')?'is-invalid':''}}" placeholder="Retencion Ganancias..." value="{{old('retencionganancias')}}">
				{!! $errors->first('retencionganancias','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="suss">SUSS</label>
				<input type="number" step=0.01 name="suss" class="form-control {{$errors->has('suss')?'is-invalid':''}}" placeholder="SUSS..." value="{{old('suss')}}">
				{!! $errors->first('suss','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="otras">Otras</label>
				<input type="number" step=0.01 name="otras" class="form-control {{$errors->has('otras')?'is-invalid':''}}" placeholder="Otras..." value="{{old('otras')}}">
				{!! $errors->first('otras','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="montofinal">Monto Final</label>
				<input type="number" step=0.01 name="montofinal" class="form-control {{$errors->has('montofinal')?'is-invalid':''}}" placeholder="Monto Final..." value="{{old('montofinal')}}">
				{!! $errors->first('montofinal','<div class="invalid-feedback">:message</div>')!!}
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