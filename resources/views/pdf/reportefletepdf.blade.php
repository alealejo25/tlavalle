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
    	 <span class="derecha">{{now()}}</span>
    </div>

    @foreach ($datoflete as $datos)
    <h2>REPORTE FLETE  - REMITO: {{$datos->nroremito}} </h2> 
	<div class="card">
		<div class="row">
		    <div class="Form-group col-lg-3" >
				<h3>Chofer: {{$datos->chofer->apellido}}, {{$datos->chofer->nombre}} / DNI: {{$datos->chofer->dni}}</h3>

				<h3>Nro de Unidad: {{$datos->camion->nro_unidad}} / Dominio: {{$datos->camion->dominio}} </h3>
                <h2>Resumen - {{$datos->descripciontarifa}}</h2>
			</div>
		</div>
	</div>

    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Importe</th>
                    <th>Gastos</th>
                    <th>Anticipo</th>
                    <th>A Cobrar</th>
                    <th>KM Salida</th>
                    <th>KM Llegada</th>
                    <th>KM Total</th>
                    <th>Total Lts.</th>
                    <th>Promedio</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td align="right">${{number_format($datos->valorflete,2,",",".")}}</td>
                    <td align="right">${{number_format($datosGastos,2,",",".")}}</td>
                    <td align="right">${{number_format($consultasumaanticipos,2,",",".")}}</td>
                    <td align="right">${{number_format($datos->montoaliquidar,2,",",".")}}</td>
                    <td align="right">{{$datos->kminicio}}</td>
                    <td align="right">{{$datos->kmfin}}</td>
                    <td align="right">{{$datos->kmtransitados}}</td>
                    <td align="right">{{$datos->combustiblegasto}}</td>
                    <td align="right">{{$datos->promedio}}</td>

                </tr>
                            
            </tbody>
        </table>
    </div>
    @endforeach   
    <h2>Remitos de Clientes</h2>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Nro. Remito</th>
                    <th>Cliente</th>
                    <th>Observacion</th>
                    <th>Modo</th>
                    <th>Pallet</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datoremitos as $datos)
                <tr>
                    <td >{{$datos->nroremito}}</td>
                    <td >{{$datos->cliente->nombre}}</td>
                    <td >{{$datos->observacion}}</td>
                    <td >{{$datos->modo}}</td>
                    <td align="right">{{$datos->pallet}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>
        <h2>Vales de Estaciones de Servicios</h2>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th>Nro. Remito Vale</th>
                    <th>Nro. Remito Estacion</th>
                    <th>Estacion</th>
                    <th>Cant. de Lts.</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datovales as $datos)
                <tr>
                    <td >{{$datos->nroremitovale}}</td>
                    <td >{{$datos->nroremitoestacion}}</td>
                    <td >{{$datos->estacion->nombre}}</td>
                    <td align="right">{{$datos->cantidad}}</td>
                </tr>
            @endforeach                   
            </tbody>
        </table>
    </div>
            


 @foreach ($datoflete as $datos)

    <div class="card">
        <div class="row">
            <div class="Form-group col-lg-3" >
                <h3>Proximo Service</h3>
                <label>Caja: {{$datos->camion->proximoservicecaja}} Km / </label>
                <label>Diferencial: {{$datos->camion->proximoservicediferencial}} Km / </label>
                <label>Motor: {{$datos->camion->proximoservicemotor}} Km</label>
            </div>
        </div>
    </div>
<br>

    @endforeach   



	<br><br><br><br><br><br>
   <div class="card">
		<div class="row">
		    <div  class="Form-group col-lg-3" >

		    	<label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;........................................................... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                ........................................................... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ...........................................................</label><br>
				<label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Firma &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Aclaracion &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; D.N.I.</label>

			</div>
	</div>
</body>
</html>