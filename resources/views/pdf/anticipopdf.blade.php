<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Anticipo</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.75rem;
            font-weight: normal;
            line-height: 1.1;
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
            border: 1px solid #c2cfd6;
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
            padding: 0.75rem;
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
            text-align: left;
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
    	 <span class="derecha">{{now()}}</span>
        <h1>ANTICIPO</h1> 
    </div>
 @foreach ($anticipo as $a)
	<div class="card">
		<div class="row">
		    <div class="Form-group col-lg-3" >
				<h2>Chofer: {{$a->chofer->apellido}}, {{$a->chofer->nombre}} </h2>
			</div>
			<div class="Form-group col-lg-3">
				<h2>Nro Remito Flete: {{$a->flete->nroremito}}</h2>
			</div>
		</div>
	</div>

    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th><h2>Nro Remito</h2></th>
                    <th><h2>Fecha</h2></th>
                    <th><h2>Descripcion Flete</h2></th>
                    <th><h2>Importe</h2></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$a->nroremito}}</td>
                    <td>{{$a->fecha}}</td>
                    <td>{{$a->flete->descripciontarifa}}</td>
                    <td align="right"><h2>$ {{number_format($a->importe,2,",",".")}}</h2></td>
                    

                </tr>
@endforeach                               
            </tbody>
        </table>
    </div>
    <br>
    <br>
        <br>
    <br>
        <br>
    <br>
   <div class="card">
		<div class="row">
		    <div  class="Form-group col-lg-3" >
		    	<h3 align="center">...........................................................</h3>
				<h3 align="center">Recibi Conforme</h3>
			</div>

	</div>

</body>
</html>