@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Finalizar Mantenimiento de Acoplado</h3>
					
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
 			
 			<form action="{{url('/mantenimientos/guardaredicionacoplado/'.$mantenimiento->id)}}" method="POST" enctype="multipart/form-data">
 				{{csrf_field()}}
 				
		
            
			<div class="Form-group">
				{{Form::label('acoplado_id', 'Dominio del Acoplado: '.$mantenimiento->acoplado->dominio)}}
			</div>
			<div class="Form-group">
				<label for="fechafinal">Fecha de Finalizacion del mantenimiento</label>
				<input type="date" name="fechafinal" id="fechafinal" class="form-control {{$errors->has('fechafinal')?'is-invalid':''}}" placeholder="Fecha de Finalizacion..." value="{{old('fechafinal')}}">
				{!! $errors->first('fechafinal','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<label for="km">Kilometros del proximo mantenimiento</label>
				<input type="text" name="km" id="km" class="form-control {{$errors->has('km')?'is-invalid':''}}" placeholder="Kilometros del proximo mantenimiento..." value="{{old('km')}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>

			<div class="Form-group">
				<button class="btn btn-primary" type="submit">Finalizar Mantenimiento</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/mantenimientos/camion"><button class="btn btn-success">Regresar</button></a>
			</div>
			</form>
		</div>
	</div> 
@endsection