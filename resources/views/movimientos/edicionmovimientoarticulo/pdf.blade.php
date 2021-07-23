
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Acoplados</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Dominio</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Año</th>

					<th>Valor</th>
					<th>Amortizacion</th>
					<th>Dominio Camion</th>

				</thead>
               @foreach ($acoplados as $acoplado)
				<tr>
					<td>{{ $acoplado->id}}</td>
					<td>{{ $acoplado->dominio}}</td>
					<td>{{ $acoplado->modelo}}</td>
					<td>{{ $acoplado->marca}}</td>
					<td>{{ $acoplado->año}}</td>

					<td>{{ $acoplado->valor}}</td>
					<td>{{ $acoplado->amortizacion}}</td>
					@if($acoplado->camion_id===NULL)
						<td><p>SIN ASOCIAR</p></td>
					@else
						<td>{{ $acoplado->camion->dominio}}</td>
					@endif
				</tr>
				@endforeach

			</table>
		</div>
	</div>
</div>


