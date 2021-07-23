@extends('layouts.admin')
@section('contenido')
	

	
{!!Form::model($role,['route'=>['roles.update',$role->id],'method'=>'PUT']) !!}

	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar permissions de Usuarios</h3>
		</div> 
	</div>
	<div class="form-group">
		{{Form::label('name','Nombre')}}
		{{Form::text('name',null,['class'=>'form-control'])}}

	</div>
	<div class="form-group">
		{{Form::label('slug','URL Amigable')}}
		{{Form::text('slug',null,['class'=>'form-control'])}}
	</div>
	<div class="form-group">
		{{Form::label('description','Descripcion')}}
		{{Form::textarea('description',null,['class'=>'form-control'])}}
	</div>
	<hr>
	<h3>Permiso especial</h3>
	<div class="form-group">
			<label>{{Form::radio('special','all-access')}} Acceso Total</label>
			<label>{{Form::radio('special','no-access')}} Ningun Total</label>
	</div>
	<hr>
	<h3>Lista de Permisos</h3>
	<div class="form-group">
		<ul class="list-unstyled">
			@foreach($permissions as $permission)
			<li>
				<label>
					
					{{Form::checkbox('permissions[]',$permission->id,null)}}
					{{$permission->name}}
					<em>({{$permission->description ?: 'Sin descripcion'}})</em>

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