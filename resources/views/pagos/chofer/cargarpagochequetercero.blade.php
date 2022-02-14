@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Pago con Cheque Tercero</h3>

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
				{!!Form::open(['route' => 'guardarpagochequetercerochofer','method'=>'POST'])!!}
			{{Form::token()}}


			<div class="Form-group">

				<input type="hidden" name="ordendepago_id" class="form-control {{$errors->has('ordendepago_id')?'is-invalid':''}}"   value="{{$id}}">
				{!! $errors->first('ordendepago_id','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<!-- <div class="Form-group">
				<label for="cheque_id">Seleccione el importe del Cheque de tercero</label>
				{!!Form::select('chequetercero_id',$chequestercero,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div> -->


			<div class="Form-group">
				<select name="chequetercero_id" id="cheque" class="form-control" >
					<option value="">Importe - Numero - Cliente - Banco - Fecha</option>
						@foreach ($chequestercero as $chequesterceros) 
							<option  value="{{ $chequesterceros->id }}">$ {{number_format($chequesterceros->importe,2,",",".")}} - {{$chequesterceros->numero}} - {{$chequesterceros->cliente->nombre}} - {{$chequesterceros->banco->denominacion}} - {{date("d/m/Y",strtotime($chequesterceros->fecha))}}</option>
						@endforeach
				</select>
			</div>

			<br>
			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/pagos/ordenesdepagos"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection