@extends('layouts.admin')
@section('contenido')
	<div  class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-12 layout-spacing">
                <div class="widget-content-area">
                    <div class="widget-one">

                        <!--TITULO-->
                        <h4 class="text-center mb-5">Reporte Cuentas Corrientes. </h4>
                        {!!Form::open(['route' => 'reportepallet','method'=>'POST'])!!}
						{{Form::token()}}
                        <!--ENCABEZADO-->
                        <div class="row">

                           <div class="col-sm-12 col-md-2 col-lg-2">Fecha inicial
                               <div class="form-group">           
	                                <input type="date" name="fechai" id="fechai" class="form-control {{$errors->has('fechai')?'is-invalid':''}}" placeholder="Fecha Inicial..." value="{{old('fechai')}}">
									{!! $errors->first('fechai','<div class="invalid-feedback">:message</div>')!!}
                              </div>
                            </div>

                           <div class="col-sm-12 col-md-2 col-lg-2">Fecha final
                               <div class="form-group">           
	                                <input type="date" name="fechaf" id="fechaf" class="form-control {{$errors->has('fechaf')?'is-invalid':''}}" placeholder="Fecha del Cheque..." value="{{old('fechaf')}}">
									{!! $errors->first('fechaf','<div class="invalid-feedback">:message</div>')!!}
                              </div>
                            </div>
							 <div class="col-sm-12 col-md-2 col-lg-2">Seleccione Cliente
                               <div class="form-group">           
									{!!Form::select('cliente_id',$clientes,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
								</div>
                            </div>
		                     <div class="col-sm-12 col-md-2 col-lg-2"> 
                               <div class="form-group">      
		                        <button type="submit" class="btn btn-info mt-4 mobile-only">Generar</button>
		                        </div>
		                    </div>
            		    </div>

			{!!Form::close()!!}

        </div>
    </div>
</div>

</div>


<!-- CONTENT AREA -->

</div>

</div>
<!--  END CONTENT AREA  -->
@endsection