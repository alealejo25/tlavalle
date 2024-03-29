@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Generar OP para Choferes</h3>

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
				{!!Form::open(['route' => 'generaropchofer','method'=>'POST','class'=>'submit-prevent-form'])!!}
			{{Form::token()}}


			<div class="Form-group">
				<label for="chofer_id">Seleccione Chofer</label>
				{!!Form::select('chofer_id',$choferes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
			</div>
			<br>
			<div class="Form-group">
				<button class="btn btn-primary submit-prevent-button" type="submit"><i class="spinner fa fa-spinner fa-spin"></i>Generar y Continuar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			
			{!!Form::close()!!}
			
		

		</div>
	</div> 
@endsection