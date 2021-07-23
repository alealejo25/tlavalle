<!-- {!! Form::open(array('url'=>'abms/camiones','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}


{{Form::close()}} -->



				<!-- BUSCADOR DE aCOPLADO-->
			{!!Form::open(['route'=>'camiones.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
				<div class="input-group">

					{!! Form::text('name',null,['class'=>'form-control','placelholder'=>'Buscar Acoplado..','aria-describedby'=>'search'])!!}
					<span class="input-group-addon"  id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			{!!Form::close()!!}
 			<!-- FIN DEL BUSCADOR-->	