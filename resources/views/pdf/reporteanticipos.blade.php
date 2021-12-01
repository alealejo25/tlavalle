<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Anticipos</title>
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
 	<h2>Reporte anticipos</h2>



	<div>



        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Chofer</th>
                    <th>Fecha</th>
                    <th>Flete</th>
                    <th>Remito</th>
                    <th>Importe</th>
                    <th>Observacion</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($consulta as $datos)
                <tr>
                    <td >{{$datos->chofer->nombre}}</td>
                    <td >{{$datos->fecha}}</td>
                    @if($datos->flete!=NULL)
						<td >{{$datos->flete->nroremito}}</td>
					@else
						<td >s/n</td>
					@endif
					<td >{{$datos->nroremito}}</td>
                    <td align="right">$ {{number_format($datos->importe,2,",",".")}}</td>
                    <td >{{$datos->observacion}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>


</body>
</html>