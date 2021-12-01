<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Flete</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.75rem;
            font-weight: normal;
            line-height: 0.9;
            color: #151b1e;           
        }
        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 3px solid #c2cfd6;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table th, .table td {
            padding: 0.25rem;
            vertical-align: top;
            border-top: 1px solid #c2cfd6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #c2cfd6;
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #c2cfd6;
        }
        th, td {
            display: table-cell;
            vertical-align: inherit;
        }
        th {
            font-weight: bold;
            text-align: -internal-center;
            text-align: center;
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .izquierda{
            float:left;
        }
        .derecha{
            float:right;
        }
    </style>
</head>
<body>
    <div>
    	 
        <img src="img/logotlpdf.jpg">
      
      <!--   <img src="{{asset('/img/logotlpdf.jpg')}}">
         <img src="{{asset('img/logotlpdf.jpg')}}">-->
      
    	 <span class="derecha">Fecha de Emision {{date("d/m/Y",strtotime(now()))  }}</span>
    </div>
 	<h2>Reporte Cta Cte Choferes</h2>
 	<h2>Periodo: Desde {{$fi}} hasta {{$ff}}</h2>
@foreach ($chofer as $datos)
<h3>Apellido y Nombre:{{$datos->apellido}}, {{$datos->nombre}}</h3>
<h3>Direccion: {{$datos->direccion}}</h3>
<h3>Cuit: {{$datos->cuit}}</h3>
@endforeach

	<div>



        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Rendicion</th>
                    <th>Descripcion</th>
                    <th>Anticipos</th>
                    <th>Gastos</th>
                    <th>Kms</th>
                    <th>Litro Total</th>
                    <th>Promedio</th>
                    <th>Rto 1</th>
                    <th>Rto 2</th>
                    <th>Rto 3</th>
                    <th>Rto 4</th>
                    <th>Estado</th>
                    <th>Valor Flete</th>
                    
                    <th>Monto a Liquidar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consulta as $datos)
                <tr>
                    <td >{{$datos->nroremito}}</td>
                    <td >{{$datos->descripciontarifa}}</td>
                    <td align="right">$ {{number_format($datos->anticipos,2,",",".")}}</td>
                    <td align="right">$ {{$datos->gastovarioflete[0]->importe}}</td>
                    <td align="right">{{$datos->kmtransitados}}</td>
                    <td align="right">{{$datos->combustiblegasto}}</td>
                    <td align="right">{{$datos->promedio}}</td>
                    @if($datos->remitoflete[0]->nroremito!=NULL)
                    <td > {{$datos->remitoflete[0]->nroremito}}</td>
                    @else
                    <td>Sin Rto</td>
                    @endif
                    @if(isset($datos->remitoflete[1]->nroremito))
                    <td > {{$datos->remitoflete[1]->nroremito}}</td>
                    @else
                    <td>Sin Rto</td>
                    @endif
                    
                    @if(isset($datos->remitoflete[2]->nroremito))
                    <td> {{$datos->remitoflete[2]->nroremito}}</td>
                    @else
                    <td>Sin Rto</td>
                    @endif

                    @if(isset($datos->remitoflete[3]->nroremito))
                    <td> {{$datos->remitoflete[3]->nroremito}}</td>
                    @else
                    <td>Sin Rto</td>
                    
                    @endif
                    <td >{{$datos->estado}}</td>
                    <td align="right">$ {{number_format($datos->valorflete,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->montoaliquidar,2,",",".")}}</td>
                    

                </tr>
            @endforeach                   
            </tbody>
        </table>
        <h3 align="right">Monto Total a Liquidar: {{$consultasumamonto}}</h3>
    </div>


</body>
</html>