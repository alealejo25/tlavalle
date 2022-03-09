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
 	<h2>Reporte Pago a Empleados</h2>

	 @foreach ($empleados as $emple)
    <h2>Empleado: {{$emple->nombre}} {{$emple->apellido}} </h2> 
	<div class="card">
		<div class="row">
		    <div class="Form-group col-lg-3" >
				<h3>Fecha de Ingreso: {{$emple->fechaingreso}} / DNI: {{$emple->dni}} / Direccion: {{$emple->direccion}} / Area: {{$emple->area}}</h3>

            </div>
		</div>
	</div>
    @endforeach 


        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>#</th>
					<th>Nro Comprob.</th>
					<th>Fec. Pago</th>
					<th>Monto</th>
					<th>Mes</th>
					<th>Año</th>
					<th>Forma</th>
					<th>Observaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datos as $dato)
                <tr>
                   <td>{{ $dato->id}}</td>
					<td>{{ $dato->nrocomprobante}}</td>
					<td>{{date("d/m/Y",strtotime($dato->fecha))  }}</td>
					<td class="text-right">${{  number_format($dato->monto,2,",",".")}}</td>
					<td>{{ $dato->mes}}</td>
					<td>{{ $dato->año}}</td>
					<td>{{ $dato->forma}}</td>
					<td>{{ $dato->observacion}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>


</body>
</html>