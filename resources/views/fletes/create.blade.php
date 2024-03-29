@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Iniciar Flete</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			{!!Form::open(array('url'=>'fletes','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','class'=>'submit-prevent-form'))!!} 
			<!-- {!!Form::model(['method'=>'POST','route'=>['camiones.store']])!!}-->
			{{Form::token()}}

			
			<div class="Form-group">
				<label for="chofer_id">Seleccione Chofer</label>
				{!!Form::select('chofer_id',$choferes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<div class="Form-group">
				<label for="anticipos">Anticipo</label>
				<input type="number" step=0.01 name="anticipos" class="form-control {{$errors->has('anticipos')?'is-invalid':''}}" placeholder="Anticipo..." value="{{old('anticipos')}}">
				{!! $errors->first('anticipos','<div class="invalid-feedback">:message</div>')!!}
			</div>
			
			<br>
			<div class="Form-group">
				<button class="btn btn-primary submit-prevent-button" type="submit" onclick="return confirm('Seguro que desea Iniciar el Flete?');"><i class="spinner fa fa-spinner fa-spin"></i>Guardar</button>
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