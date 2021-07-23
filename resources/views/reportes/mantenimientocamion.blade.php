@extends('layouts.admin')
@section('contenido')
	<div  class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-12 layout-spacing">
                <div class="widget-content-area">
                    <div class="widget-one">

                        <!--TITULO-->
                        <h4 class="text-center mb-5">Reporte Mantenimiento por camion </h4>
                        {!!Form::open(['route' => 'reportemantenimientocamion','method'=>'POST'])!!}
						{{Form::token()}}
                        <!--ENCABEZADO-->
                        <div class="row">
							 <div class="col-sm-12 col-md-2 col-lg-2">Seleccione Camion
                               <div class="form-group">           
									{!!Form::select('camion_id',$camion,null,['class' => 'form-control','placeholder'=>'Seleccione una opcion','requerid' ])!!}
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