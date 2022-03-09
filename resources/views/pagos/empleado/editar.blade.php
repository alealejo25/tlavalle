@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-lg-6 col-lg-6 col-xs-12">
			<h3>Editar Pago a empleado</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif	
 			
			
			<form action="{{url('/pagos/empleados/guardaredicion/'.$datos->id)}}" method="POST" enctype="multipart/form-data">
 				{{csrf_field()}}

			
<div class="Form-group">
				<table>
					<tr>
						<td>
							{{Form::label('mes', 'Mes')}}
							{!!Form::select('mes',['ENERO'=>'ENERO','FEBRERO'=>'FEBRERO','MARZO'=>'MARZO','ABRIL'=>'ABRIL','MAYO'=>'MAYO','JUNIO'=>'JUNIO','JULIO'=>'JULIO','AGOSTO'=>'AGOSTO','SEPTIEMBRE'=>'SEPTIEMBRE','OCTUBRE'=>'OCTUBRE','NOVIEMBRE'=>'NOVIEMBRE','DICIEMBRE'=>'DICIEMBRE'],$datos->mes)!!}
						</td>
						<td>&nbsp;</td>
						<td>
							{{Form::label('año', 'Año de Pago')}}
							{!!Form::select('año',['2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],$datos->año)!!}
						</td>
						</td>
					</tr>
				</table>
			</div>





			<div class="Form-group">
				<label for="monto">Monto</label>
				<input type="number" step=0.01 name="monto" class="form-control {{$errors->has('monto')?'is-invalid':''}}" placeholder="Monto..." value="{{$datos->monto}}">
				{!! $errors->first('monto','<div class="invalid-feedback">:message</div>')!!}
			</div>
			
			<br>

			<div class="Form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" class="form-control {{$errors->has('observacion')?'is-invalid':''}}" value="{{$datos->observacion}}"> 
				{!! $errors->first('observacion','<div class="invalid-feedback">:message</div>')!!}
			</div>
						<div class="Form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
			
			<div class="Form-group">
				<br/>
				<a href="/abms/acoplados"><button class="btn btn-success">Regresar</button></a>
			</div>

		</div>
	</div> 
@endsection