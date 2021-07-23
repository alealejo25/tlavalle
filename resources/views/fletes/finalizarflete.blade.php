@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Finalizar Flete</h3>

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
			{!!Form::open(['route' => ['guardarfinalizarflete',$id],'method'=>'POST','class'=>'submit-prevent-form'])!!}

			{{Form::token()}}
			<div class="Form-group">
				<input type="hidden" name="flete_id" class="form-control {{$errors->has('flete_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('flete_id','<div class="invalid-feedback">:message</div>')!!}
			</div>

				@foreach ($flete as $fletes)
				<tr>
					<td><h4>Numero de Remito: {{ $fletes->nroremito}}</h4></td>
					<td><h5>Km de Salida: {{ $fletes->kminicio}}</h4></td>
					<td><h5>Chofer: {{ $fletes->chofer->nombre}}</h5></td>
					<td><h5>Camion: {{ $fletes->camion->dominio}}</h5></td>
					<td><h5>Descripcion del Flete: {{ $fletes->descripciontarifa}}</h5></td>

				</tr>
				@endforeach
	<br>
				<h4>ANTICIPOS</h4>
               @foreach ($anticipos as $anticipo)
				<tr>
					<td><h4>Numero de Remito: {{ $anticipo->nroremito}}</h4></td>
					<td><h5>Importe: $ {{number_format($anticipo->importe,2,",",".") }}</h5></td>
					<td><h5>Fecha: {{ $anticipo->fecha}}</h5></td>
				</tr>
				@endforeach
				<br>
			<!-- 	<h4>VALES</h4>
				@foreach ($vales as $vale)
				<tr>
					<td><h4>Numero de Remito: {{ $vale->nroremito}}</h4></td>
					<td><h5>Cantidad de Litros: {{ $vale->cantidad}}</h5></td>
					<td><h5>Fecha: {{ $vale->fecha}}</h5></td>
				</tr>
				@endforeach -->

			<div class="row">

				<div class="Form-group col-lg-4 col-md-4 col-sm-12">
					<label for="valorflete">Valor del Flete</label>
					<input type="number" step=0.01 name="valorflete" class="form-control {{$errors->has('valorflete')?'is-invalid':''}}" placeholder="Valor Flete..." value="{{old('valorflete')}}">
					{!! $errors->first('valorflete','<div class="invalid-feedback">:message</div>')!!}
				</div>
			</div>

			<div class="row">
			<div class="form-group col-lg-3 col-md-4 col-sm-12">
				<label for="kmfin">KM de Llegada</label>
				<input type="number" name="kmfin" class="form-control {{$errors->has('kmfin')?'is-invalid':''}}" value="{{old('kmfin')}}"> 
				{!! $errors->first('kmfin','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-12">
				<label for="importe">Gastos Varios $</label>
				<input type="number" step=0.01 name="importe" class="form-control {{$errors->has('importe')?'is-invalid':''}}" value="{{old('importe')}}"> 
				{!! $errors->first('importe','<div class="invalid-feedback">:message</div>')!!}
				
			</div>
			<div class="form-group col-lg-6 col-md-4 col-sm-12">
				<label for="descripcion">Descripcion / Gastos Varios</label>
				<input type="text" name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value="{{old('descripcion')}}"> 
				{!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
			</div>

			</div>
			<hr size="8px">
			<div class="row">
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="cliente_id1">Seleccione Cliente 1- IDA</label>
					{!!Form::select('cliente_id1',$clientes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="remito1">Nro. Remito ida 1</label>
					<input type="text" name="remito1" class="form-control {{$errors->has('remito1')?'is-invalid':''}}" value="{{old('remito1')}}"> 
					{!! $errors->first('remito1','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="pallete1">Pallet Entr 1</label>
					<input type="pallete1" name="pallete1" class="form-control {{$errors->has('pallete1')?'is-invalid':''}}" value="{{old('pallete1')}}"> 
					{!! $errors->first('pallete1','<div class="invalid-feedback">:message</div>')!!}
 				</div>

 				
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="clientedev1">Seleccione Cliente 1- Devuelve pallet</label>
					<select name="clientedev1" id="cliente" class="form-control">
					<option value="">Selecccione un cliente</option>
						@foreach ($clientesnombres as $cliente) 
					<option value="{{ $cliente->nombre }}">{{$cliente->nombre}}</option>
						@endforeach
					</select>
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="valepalletd1">Nro Vale Dev. - 1 </label>
					<input type="text" name="valepalletd1" class="form-control {{$errors->has('valepalletd1')?'is-invalid':''}}" value="{{old('valepalletd1')}}"> 
					{!! $errors->first('valepalletd1','<div class="invalid-feedback">:message</div>')!!}

 				</div>
 				 	<div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="palletd1">Pallet Dev 1</label>
					<input type="text" name="palletd1" class="form-control {{$errors->has('palletd1')?'is-invalid':''}}" value="{{old('palletd1')}}"> 
					{!! $errors->first('palletd1','<div class="invalid-feedback">:message</div>')!!}
 				</div>
				
 			</div>
 			<hr size="8px">
 			<div class="row">
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="cliente_id2">Seleccione Cliente 2- IDA</label>
					{!!Form::select('cliente_id2',$clientes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="remito2">Nro. Remito ida 2</label>
					<input type="text" name="remito2" class="form-control {{$errors->has('remito2')?'is-invalid':''}}" value="{{old('remito2')}}"> 
					{!! $errors->first('remito2','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="pallete2">Pallet Ent 2</label>
					<input type="pallete2" name="pallete2" class="form-control {{$errors->has('pallete2')?'is-invalid':''}}" value="{{old('pallete2')}}"> 
					{!! $errors->first('remito1','<div class="invalid-feedback">:message</div>')!!}
 				</div>
				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="clientedev2">Seleccione Cliente 2- Devuelve pallet</label>
					<select name="clientedev2" id="cliente" class="form-control">
					<option value="">Selecccione un cliente</option>
						@foreach ($clientesnombres as $cliente) 
					<option value="{{ $cliente->nombre }}">{{$cliente->nombre}}</option>
						@endforeach
					</select>
 				</div>
 				 <div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="valepalletd2">Nro Vale Dev. - 2</label>
					<input type="text" name="valepalletd2" class="form-control {{$errors->has('valepalletd2')?'is-invalid':''}}" value="{{old('valepalletd2')}}"> 
					{!! $errors->first('valepalletd2','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				 <div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="palletd2">Pallet Dev 2</label>
					<input type="text" name="palletd2" class="form-control {{$errors->has('palletd2')?'is-invalid':''}}" value="{{old('palletd2')}}"> 
					{!! $errors->first('palletd2','<div class="invalid-feedback">:message</div>')!!}
 				</div>

				
 			</div>
 			<hr size="8px">

 			 <div class="row">
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="cliente_id3">Seleccione Cliente 3- Vuelta</label>
					{!!Form::select('cliente_id3',$clientes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="remito3">Nro. Remito vuelta 3</label>
					<input type="text" name="remito3" class="form-control {{$errors->has('remito3')?'is-invalid':''}}" value="{{old('remito3')}}"> 
					{!! $errors->first('remito3','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="pallete3">Pallet Ent 3</label>
					<input type="pallete3" name="pallete3" class="form-control {{$errors->has('pallete3')?'is-invalid':''}}" value="{{old('pallete3')}}"> 
					{!! $errors->first('remito1','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="clientedev3">Seleccione Cliente 2- Devuelve pallet</label>
					<select name="clientedev3" id="cliente" class="form-control">
					<option value="">Selecccione un cliente</option>
						@foreach ($clientesnombres as $cliente) 
					<option value="{{ $cliente->nombre }}">{{$cliente->nombre}}</option>
						@endforeach
					</select>
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="valepalletd3">Nro Vale Dev. - 3</label>
					<input type="text" name="valepalletd3" class="form-control {{$errors->has('valepalletd3')?'is-invalid':''}}" value="{{old('valepalletd3')}}"> 
					{!! $errors->first('valepalletd3','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				 <div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="palletd3">Pallet Dev 3</label>
					<input type="text" name="palletd3" class="form-control {{$errors->has('palletd3')?'is-invalid':''}}" value="{{old('palletd3')}}"> 
					{!! $errors->first('palletd3','<div class="invalid-feedback">:message</div>')!!}
 				</div>

				
 			</div>
 			<hr size="8px">

 			 <div class="row">
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="cliente_id4">Seleccione Cliente 4- Vuelta</label>
					{!!Form::select('cliente_id4',$clientes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="remito4">Nro. Remito vuelta 3</label>
					<input type="text" name="remito4" class="form-control {{$errors->has('remito4')?'is-invalid':''}}" value="{{old('remito4')}}"> 
					{!! $errors->first('remito4','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="pallete4">Pallet Ent 4</label>
					<input type="pallete4" name="pallete4" class="form-control {{$errors->has('pallete4')?'is-invalid':''}}" value="{{old('pallete4')}}"> 
					{!! $errors->first('remito1','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 				<div class="form-group col-lg-6 col-md-4 col-sm-12">
 					<label for="clientedev4">Seleccione Cliente 2- Devuelve pallet</label>
					<select name="clientedev4" id="cliente" class="form-control">
					<option value="">Selecccione un cliente</option>
						@foreach ($clientesnombres as $cliente) 
					<option value="{{ $cliente->nombre }}">{{$cliente->nombre}}</option>
						@endforeach
					</select>
 				</div>
 				<div class="form-group col-lg-4 col-md-4 col-sm-12">
					<label for="valepalletd4">Nro Vale Dev. - 4</label>
					<input type="text" name="valepalletd4" class="form-control {{$errors->has('valepalletd4')?'is-invalid':''}}" value="{{old('valepalletd4')}}"> 
					{!! $errors->first('valepalletd4','<div class="invalid-feedback">:message</div>')!!}
 				</div>
				
 				 <div class="form-group col-lg-2 col-md-4 col-sm-12">
 					<label for="palletd4">Pallet Dev 4</label>
					<input type="text" name="palletd4" class="form-control {{$errors->has('palletd4')?'is-invalid':''}}" value="{{old('palletd4')}}"> 
					{!! $errors->first('palletd4','<div class="invalid-feedback">:message</div>')!!}
 				</div>
 	
 			</div>
 			<hr size="8px">
 			

			<div class="Form-group">
				<h4> Vales </h4>
			</div>

			    @foreach ($vales as $r)
			    	
		
					<td><h5>Nro. de remito del vale: {{ $r->nroremitovale}} / Cantidad de litros: {{ $r->cantidad}} / Fecha: {{ $r->fecha}} / Remito Estacion: {{ $r->nroremitoestacion}}</h5></td>
				@endforeach


			<div class="Form-group">
				<table>
					<tr>
						<td>
							<label for="estacion_id1">Seleccione Estacion - Vale 1</label>
							{!!Form::select('estacion_id1',$estaciones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="vale1">Vale de Gas Oil</label>
							<input type="number" name="vale1" class="form-control {{$errors->has('vale1')?'is-invalid':''}}" value="{{old('vale1')}}"> 
							{!! $errors->first('vale1','<div class="invalid-feedback">:message</div>')!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="nroremitoestacion1">Remito/Factura</label>
							<input type="text" name="nroremitoestacion1" class="form-control {{$errors->has('nroremitoestacion1')?'is-invalid':''}}" value="{{old('nroremitoestacion1')}}"> 
							{!! $errors->first('nroremitoestacion1','<div class="invalid-feedback">:message</div>')!!}
						</td>
					</tr>
				</table>
			</div>
			<div class="Form-group">
				<table>
					<tr>
						<td>
							<label for="estacion_id2">Seleccione Estacion - Vale 2</label>
							{!!Form::select('estacion_id2',$estaciones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="vale2">Vale de Gas Oil</label>
							<input type="number" name="vale2" class="form-control {{$errors->has('vale2')?'is-invalid':''}}" value="{{old('vale2')}}"> 
							{!! $errors->first('vale2','<div class="invalid-feedback">:message</div>')!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="nroremitoestacion2">Remito/Factura</label>
							<input type="text" name="nroremitoestacion2" class="form-control {{$errors->has('nroremitoestacion2')?'is-invalid':''}}" value="{{old('nroremitoestacion2')}}"> 
							{!! $errors->first('nroremitoestacion2','<div class="invalid-feedback">:message</div>')!!}
						</td>
					</tr>
				</table>
			</div>
			<div class="Form-group">
				<table>
					<tr>
						<td>
							<label for="estacion_id3">Seleccione Estacion - Vale 3</label>
							{!!Form::select('estacion_id3',$estaciones,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="vale3">Vale de Gas Oil</label>
							<input type="number" name="vale3" class="form-control {{$errors->has('vale3')?'is-invalid':''}}" value="{{old('vale3')}}"> 
							{!! $errors->first('vale3','<div class="invalid-feedback">:message</div>')!!}
						</td>
						<td>&nbsp;</td>
						<td>

							<label for="nroremitoestacion3">Remito/Factura</label>
							<input type="text" name="nroremitoestacion3" class="form-control {{$errors->has('nroremitoestacion3')?'is-invalid':''}}" value="{{old('nroremitoestacion3')}}"> 
							{!! $errors->first('nroremitoestacion3','<div class="invalid-feedback">:message</div>')!!}
						</td>
					</tr>
				</table>
			</div>
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary  submit-prevent-button" type="submit"><i class="spinner fa fa-spinner fa-spin"></i>Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/fletes"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection