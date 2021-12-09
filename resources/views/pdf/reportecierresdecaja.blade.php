<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Cierres de Caja</title>
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
    	  <span class="derecha">Fecha de Emision {{date("d/m/Y",strtotime(now()))  }}</span>
    </div>
 	<h2>Reporte de Ctas. Ctes. Clientes</h2>

@foreach ($caja as $datos)
<h3>Denominacion: {{$datos->denominacion}}</h3>
<h3>Descripcion: {{$datos->descripcion}}</h3>

@endforeach

	<div>



        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Gastos Varios</th>
                    <th>Dinero Caja</th>
                    <th>Dinero Fisico</th>
                    <th>Diferencia</th>
                    <th>Iniciales</th>
                    <th>Pagos</th>
                    <th>Transferencias</th>
                    <th>Cobro de Cheques</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consulta as $datos)
                <tr>
                    <td >{{date("d/m/Y",strtotime($datos->fecha))  }}</td>
                    <td >{{$datos->descripcion}}</td>
                    <td align="right">$ {{number_format($datos->gastosvarios,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->dinerocaja,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->dinerofisico,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->diferencia,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->iniciales,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->pagos,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->transferencias,2,",",".")}}</td>
                    <td align="right">$ {{number_format($datos->cobrocheques,2,",",".")}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>


</body>
</html>