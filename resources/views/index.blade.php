@extends('layouts.admin') 
@section('contenido')
@if(Session::has('Mensaje')){{
    
    Session::get('Mensaje')
}}
@endif
@can('administradores')
<h4>Cajas</h4>
<div class="row">
	 @foreach ($consultamovimientos2 as $consultamovimiento2)

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
             <div class="small-box bg-aqua">
                    <div class="inner">
                          <h3>$ {{ $consultamovimiento2->importe_final  }},00</h3>
                          <p>Caja Principal</p>
                    </div>
                    <div class="icon">
                          <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ultimos Movimientos <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
     
   @endforeach

      <!-- ./col -->
   @foreach ($consultamovimientos1 as $consultamovimiento1)
        <div class="col-lg-3 col-xs-6">
           <!-- small box -->
              <div class="small-box bg-green">
                      <div class="inner">
                            <h3>$ {{ $consultamovimiento1->importe_final  }},00</h3>
                            <p>Caja Recepcion</p>
                      </div>
                      <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">Ultimos Movimientos <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
    @endforeach
 

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
             <div class="small-box bg-aqua">
                    <div class="inner">
                          <h3> {{ $consultapallet}}</h3>
                          <p>Cantidad de Pallet en deposito</p>
                    </div>
                    <div class="icon">
                          <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ultimos Movimientos <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
     
  
</div>

<h4>Cheques Propios por vencer pago</h4>
<div class="row" >

        @foreach ($chequespropioporvencer as $chequespropioporvencer)

          <div class="col-lg-3 col-xs-6">
           <!-- small box -->
              <div class="small-box bg-green">
                      <div class="inner">
                            <h3>{{ $chequespropioporvencer->fecha  }}</h3>
                            <p>${{ $chequespropioporvencer->importe }},00 / CBU: {{ $chequespropioporvencer->cuentabancariapropia->cbu }}</p>
                      </div>
                      <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">Listado de Mantenimiento<i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>

        @endforeach
        <!-- ./col -->
</div>
@endcan

<h4>Camiones con mantenimiento</h4>
<div class="row" >

        @foreach ($consultacamion as $r)

          <div class="col-lg-3 col-xs-6">
           <!-- small box -->
              <div class="small-box bg-green">
                      <div class="inner">
                            <h3>{{ $r->dominio  }} / {{ $r->nro_unidad }}</h3>
                            <p>Camiones que estan actualmente en mantenimiento</p>
                      </div>
                      <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="mantenimientos/listarcamion" class="small-box-footer">Listado de Mantenimiento<i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>

        @endforeach
        <!-- ./col -->
</div>


<hr style="width:100%;">
<h4>Mantenimientos</h4>
<div class="row">
        @foreach ($consultamantenimientoscamion as $consultamantenimientoscamiones)


          @if ($consultamantenimientoscamiones->km >= ($consultamantenimientoscamiones->proximoservicecaja-2500) and $consultamantenimientoscamiones->km < $consultamantenimientoscamiones->proximoservicecaja )
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio  }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Debe realizar mantenimiento CAJA</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
            @if($consultamantenimientoscamiones->km >= $consultamantenimientoscamiones->proximoservicecaja)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Mantenimiento de CAJA vencido </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endif
          @endif



          @if ($consultamantenimientoscamiones->km >= ($consultamantenimientoscamiones->proximoservicediferencial-2500) and $consultamantenimientoscamiones->km < $consultamantenimientoscamiones->proximoservicediferencial )
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio  }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Debe realizar mantenimiento DIFERENCIAL</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
            @if($consultamantenimientoscamiones->km >= $consultamantenimientoscamiones->proximoservicediferencial)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Mantenimiento de DIFERENCIAL vencido </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endif
          @endif

          @if ($consultamantenimientoscamiones->km >= ($consultamantenimientoscamiones->proximoservicemotor-2500) and $consultamantenimientoscamiones->km < $consultamantenimientoscamiones->proximoservicemotor )
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio  }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Debe realizar mantenimiento MOTOR</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
            @if($consultamantenimientoscamiones->km >= $consultamantenimientoscamiones->proximoservicemotor)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $consultamantenimientoscamiones->dominio }} / U: {{ $consultamantenimientoscamiones->nro_unidad }}</h3>

                  <p>Mantenimiento de MOTOR vencido </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/mantenimientos/camion" class="small-box-footer">Ir a mantenimiento <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endif
          @endif


        @endforeach
        <!-- ./col -->
</div>
<hr style="width:100%;">
@can('administradores')
<h4>Prestamos</h4>
<div class="row" >

        @foreach ($consultaprestamos as $consultaprestamo)

          @if ($consultaprestamo->fechaproximopago == $mfecha)

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h2>{{ $consultaprestamo->chofer->nombre  }}</h2>
                  <h2>Cuota : $ {{ $consultaprestamo->valorcuota }},00</h2>
                  <p>Vencimiento Prestamo en el mes en curso</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/pagos/listarprestamo" class="small-box-footer">Ir a prestamos a choferes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
            @if($consultaprestamo->fechaproximopago > $mfecha)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h2>{{ $consultaprestamo->chofer->nombre  }}</h2>
                  <h2>Cuota : $ {{ $consultaprestamo->valorcuota }},00</h2>
                  <p>PRESTAMO VENCIDO</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/pagos/listarprestamo" class="small-box-footer">Ir a prestamos a choferes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endif
          @endif

        @endforeach
        <!-- ./col -->
</div>
@endcan


  @endsection