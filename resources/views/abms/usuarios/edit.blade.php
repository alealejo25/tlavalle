@extends('layouts.admin')
@section('contenido')
	

	
{!!Form::model($user,['route'=>['usuarios.update',$user->id],'method'=>'PUT']) !!}

	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Roles de Usuarios</h3>
		</div> 
	</div>
	<div class="form-group">
		{{Form::text('name',null,['class'=>'form-control'])}}
	</div>
	<hr>
	<div class="form-group">
		<ul class="list-unstyled">
			@foreach($roles as $role)
			<li>
				<label>
					
					{{Form::checkbox('roles[]',$role->id, old('roles'))}}
					{{$role->name}}
					<em>({{$role->description ?: 'Sin descripcion'}})</em>

				</label>
			</li>
			@endforeach
		</ul>
	</div>
	<div>
			{{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
	</div>
	{!! Form::close() !!}
@endsection