@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Finalizar Mantenimiento  de Camiones</h3>
					
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
 			
 			<form action="{{url('/mantenimientos/guardaredicioncamion/'.$mantenimiento->id)}}" method="POST" enctype="multipart/form-data">
 				{{csrf_field()}}
 				
		
            
			<div class="Form-group">
				{{Form::label('camion_id', 'Dominio del Camion: '.$mantenimiento->camion->dominio)}}
			</div>
			<div class="Form-group">
				<label for="fechafinal">Fecha de Finalizacion del mantenimiento</label>
				<input type="date" name="fechafinal" id="fechafinal" class="form-control {{$errors->has('fechafinal')?'is-invalid':''}}" placeholder="Fecha de Finalizacion..." value="{{old('fechafinal')}}">
				{!! $errors->first('fechafinal','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<br>
			<div class="Form-group">
				<label for="km">Kilometros del proximo Caja (dejar campo vacion para no modificar el datos)</label>
				<input type="text" name="kmcaja" id="kmcaja" class="form-control {{$errors->has('kmcaja')?'is-invalid':''}}" placeholder="Kilometros del proximo mantenimiento Caja..." value="{{old('kmcaja')}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="km">Kilometros del proximo Diferencial (dejar campo vacion para no modificar el datos)</label>
				<input type="text" name="kmdiferencial" id="kmdiferencial" class="form-control {{$errors->has('kmdiferencial')?'is-invalid':''}}" placeholder="Kilometros del proximo mantenimiento Diferencial..." value="{{old('kmdiferencial')}}">
				{!! $errors->first('km','<div class="invalid-feedback">:message</div>')!!}
			</div>
			<div class="Form-group">
				<label for="km">Kilometros del proximo Motor (dejar campo vacion para no modificar el datos)</label>
				<input type="text" name="kmmotor" id="kmmotor" class="form-control {{$errors->has('kmmotor')?'is-invalid':''}}" placeholder="Kilometros del proximo mantenimiento Motor..." value="{{old('kmmotor')}}">
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