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
    	 <IMG SRC="img\logotlpdf.jpg">
    	  <span class="derecha">Fecha de Emision {{date("d/m/Y",strtotime(now()))  }}</span>
    </div>

    @foreach ($datosopproveedor as $datos)
            <h2>ORDEN DE PAGO NUMERO: {{$datos->numero}} </h2> 
	<div class="card">
		<div class="row">
		    <div class="Form-group col-lg-3" >
				<h3>Monto: {{$datos->proveedor->nombre}} / CUIT: {{$datos->proveedor->cuit}}</h3>

				<h3>Monto: $ {{number_format($datos->montofinal,2,",",".")}} / Fecha: {{$datos->fecha}} </h3>
            </div>
		</div>
	</div>
    @endforeach   
    <h2>Resumen de la Orden de Pago</h2>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>N° de Valor</th>
                    <th>Monto</th>
                    <th>Nro de Instrumento</th>
                    <th>Fecha</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($datomovop as $datos)
                <tr>
                    <td >{{$datos->forma}}</td>
                    <td align="right">$ {{number_format($datos->importe,2,",",".")}}</td>
                    <td align="right">{{$datos->nroinstrumento}}</td>
                    <td >{{$datos->fecha}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>
   <div class="card">
        <div class="row">
            <div  class="Form-group col-lg-3" >

                <h3 align="right">Son: {{$montoenletras}}</h3>

            </div>
    </div>
	<br><br><br><br><br><br>
   <div class="card">
		<div class="row">
		    <div  class="Form-group col-lg-3" >

                <h4 align='center'>-----------------------------------------------</h4>
				<h4 align='center'>Firma y Aclaracion</h4>

			</div>
	</div>
</body>
</html>