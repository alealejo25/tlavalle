@extends('layouts.admin')
@section('contenido')

@if(Session::has('Mensaje')){{
	
	Session::get('Mensaje')
}}
@endif
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive ">
			@foreach ($datoFlete as $flete)
			<form action="{{url('fletes/listarfletePdf/'.$flete->id.'/pdf') }}">
			{{csrf_field()}}
				<button type="submit" class="btn btn-danger">  PDF Flete</button>
			</form>
			@endforeach
		</div>
	</div>
</div>





@endsection