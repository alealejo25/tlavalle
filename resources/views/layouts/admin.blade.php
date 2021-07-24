<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transportes Lavalle | Sistema Integral</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/submit.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/lte/select2/dist/css/select2.min.css')}}">



<!-- agregado para probar fullcalendar
 jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- custom scripts --> 
<script type="text/javascript" src="js/script.js"></script> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >

<!-- fullcalendar -->
<link href="css/fullcalendar.css" rel="stylesheet" />
<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src="js/moment.min.js"></script>
<script src="js/fullcalendar.js"></script>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


    <!-- estilo para el tamaño del select2 -->
    <style>
      .select2-selection{
        height:calc(1.7em + .75rem + 2px) !important;
      }

    </style>

  <!--  ------->

    <!-- mecorre el menu de la plantilla  AGREGADO PARA HACER VALIDACION -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" /> -->

  </head>
  <div class="Form-group">
    <div class="row"> 
      
    </div>
   </div>
  <body class="hold-transition skin-blue sidebar-mini">
<!----AQUI PEGUE EL LOGIN MEJORAR ESTO  si se borra no pasa nada-->









   
  <!-- MEJORAR ESTO ------->

    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TL</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Trans. Lavalle</b></span>
        </a>

         <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul >
                        <!-- Authentication Links -->
                        @guest
                           
                                <a class="nav-link" href="{{ route('login') }}" >{{ __('Login') }}</a>
                           
                           
                        @else

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        

                        @endguest
                    </ul>
                </div>


                <ul>
                
                  @auth
                  
                        <a href="#" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Cerrar Sesion</a>

                  @endauth
                </ul>
          
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li>
              <a href="/">
                <i class="fa fa-info-circle"></i> <span>Inicio</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>ABM's</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('acoplados_index')
                <li><a href="/abms/acoplados"><i class="fa fa-circle-o"></i> Acoplados</a></li>
                @endcan
                @can('articulos_index')
                <li><a href="/abms/articulos"><i class="fa fa-circle-o"></i> Articulos</a></li>
                @endcan
                @can('bancos_index')
                <li><a href="/abms/bancos"><i class="fa fa-circle-o"></i> Bancos</a></li>
                @endcan
                @can('bienesdeuso_index')
                <li><a href="/abms/bienesdeuso"><i class="fa fa-circle-o"></i> Bienes de Uso</a></li>
                @endcan
                @can('cajas_index')
                <li><a href="/abms/cajas"><i class="fa fa-circle-o"></i> Cajas</a></li>
                @endcan
                @can('camiones_index')
                <li><a href="/abms/camiones"><i class="fa fa-circle-o"></i> Camiones</a></li>
                @endcan
                @can('categorias_index')
                <li><a href="/abms/categorias"><i class="fa fa-circle-o"></i> Categorias de Articulos</a></li>
                @endcan
                @can('choferes_index')
                <li><a href="/abms/choferes"><i class="fa fa-circle-o"></i> Choferes</a></li>
                @endcan
                @can('clientes_index')
                <li><a href="/abms/clientes"><i class="fa fa-circle-o"></i> Clientes</a></li>
                @endcan
                @can('cuentasbancariaspropias_index')
                <li><a href="/abms/cuentasbancariaspropias"><i class="fa fa-circle-o"></i> Cuentas Bancarias 
                Propias</a></li>
                @endcan
                @can('cuentasbancariasproveedores_index')
                <li><a href="/abms/cuentasbancariasproveedores"><i class="fa fa-circle-o"></i> Cuentas Bancarias Proveedores</a></li>
                @endcan
                @can('estaciones_index')
                <li><a href="/abms/estaciones"><i class="fa fa-circle-o"></i> Estaciones de Servicio</a></li>
                @endcan
                @can('proveedores_index')
                <li><a href="/abms/proveedores"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                @endcan
                @can('repuestos_index')
                <li><a href="/abms/repuestos"><i class="fa fa-circle-o"></i> Repuestos</a></li>
                @endcan
                @can('tarifas_index')
                <li><a href="/abms/tarifas"><i class="fa fa-circle-o"></i> Tarifas de Fletes</a></li>
                @endcan
                @can('vehiculosparticulares_index')
                <li><a href="/abms/vehiculosparticulares"><i class="fa fa-circle-o"></i> Vehiculos Particulares</a></li>
                @endcan
                @can('afipprestamosmoratorias_index')
                <li><a href="/abms/afipprestamosmoratorias"><i class="fa fa-circle-o"></i> Afip Moratoria/Plan Pago</a></li>
                @endcan
                @can('rentasprestamosmoratorias_index')
                <li><a href="/abms/rentasprestamosmoratorias"><i class="fa fa-circle-o"></i> Rentas Moratoria/Plan Pago</a></li>
                @endcan
                @can('prestamos_index')
                <li><a href="/abms/prestamos"><i class="fa fa-circle-o"></i> Prestamos</a></li>
                @endcan
                @can('usuarios_index')
                <li><a href="/abms/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                @endcan
                <!-- <li><a href="categoria"><i class="fa fa-circle-o"></i> Usuarios</a></li> -->
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Operaciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('movimientosarticulos')
                <li><a href="/movimientos/articulos"><i class="fa fa-circle-o"></i> Ingreso y Egreso Stock</a></li>
                @endcan
                @can('edicionmovimientoarticulo')
                <li><a href="/movimientos/edicionmovimientoarticulo"><i class="fa fa-circle-o"></i> Movimientos Art.</a></li>
                @endcan
                @can('movimientospallets')
                <li><a href="/movimientos/pallets"><i class="fa fa-circle-o"></i> Ingreso y Egreso Pallet</a></li>
                @endcan
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Cuentas Corrientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('ctascteschoferes')
                <li><a href="/cuentascorrientes/choferes"><i class="fa fa-circle-o"></i> Choferes</a></li>
                @endcan
                @can('ctasctesclientes')
                <li><a href="/cuentascorrientes/clientes"><i class="fa fa-circle-o"></i> Clientes</a></li>
                @endcan
                @can('ctasctesproveedores')
                <li><a href="/cuentascorrientes/proveedores"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                @endcan
                
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Mantenimiento</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('mantenimientocamion')
                <li><a href="/mantenimientos/camion"><i class="fa fa-circle-o"></i> Iniciar Mantenimiento Camion</a></li>
                @endcan
                @can('listarmantenimientocamion')
                <li><a href="/mantenimientos/listarcamion"><i class="fa fa-circle-o"></i> Mantenimientos Camion</a></li>
                @endcan
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Choferes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('anticiposchoferes')
                <li><a href="/pagos/anticipo"><i class="fa fa-circle-o"></i> Anticipo</a></li>
                @endcan
                @can('prestamochoferes')
                <li><a href="/pagos/prestamo"><i class="fa fa-circle-o"></i> Iniciar Prestamo</a></li>
                @endcan
                @can('listarprestamochoferes')
                <li><a href="/pagos/listarprestamo"><i class="fa fa-circle-o"></i> Prestamos</a></li>
                @endcan
                


                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">

                <i class="fa fa-folder"></i> <span>Finanzas</span>
                <i class="fa fa-angle-left pull-right"></i>

              </a>
              <ul class="treeview-menu">
                
                @can('chequeterceros')
                <li><a href="/finanzas/chequesterceros"><i class="fa fa-circle-o"></i> Cheques de Terceros</a></li>
                @endcan
                @can('cierresdecaja')
                <li><a href="/finanzas/cierrecajas/create"><i class="fa fa-circle-o"></i> Cierres de Caja</a></li>
                @endcan
                @can('cobrochequepropio')
                <li><a href="/finanzas/movimientoscajas/ingresarchequepropio"><i class="fa fa-circle-o"></i> Cobro de Cheque Propio</a></li>
                @endcan
                @can('ingresochequepropio')
                <li><a href="/finanzas/chequespropios"><i class="fa fa-circle-o"></i> Ingreso de Cheques Propios</a></li>
                @endcan
                @can('ingresochequetercero')
                <li><a href="/finanzas/chequesterceros/create"><i class="fa fa-circle-o"></i> Ingreso Cheque Tercero</a></li>
                @endcan
                @can('movimientoscaja')
                <li><a href="/finanzas/movimientoscajas/iniciar"><i class="fa fa-circle-o"></i> Movimientos de Caja</a></li>
                @endcan
                @can('transferenciascaja')
                <li><a href="/finanzas/movimientoscajas/ingresartransferencia"><i class="fa fa-circle-o"></i> Transferencias de Cajas</a></li>
                @endcan
                
                <!--<li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> ***** Cuentas Bancarias falta</a></li>-->
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Pagos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('opchoferes')
                <li><a href="/pagos/opchoferes"><i class="fa fa-circle-o"></i> Generar OP P/Choferes</a></li>
                @endcan
                @can('opproveedores')
                <li><a href="/pagos/opproveedores"><i class="fa fa-circle-o"></i> Generar OP P/Proveedores</a></li>
                @endcan
                @can('op')
                <li><a href="/pagos/ordenesdepagos"><i class="fa fa-circle-o"></i> Ordenes de Pagos</a></li>
                @endcan
               </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Fletes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('iniciarflete')
                <li><a href="/fletes/create"><i class="fa fa-circle-o"></i> Iniciar</a></li>
                @endcan
                @can('listarfletes')
                <li><a href="/fletes"><i class="fa fa-circle-o"></i> Fletes</a></li>
                @endcan
                
 
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Consultas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                @can('pdfmantenimientos')
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Mantenimiento Acoplados</a></li>
                @endcan
                @can('pdfstock')
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Stock</a></li>
                @endcan

                <li class="treeview">
                    <a href="#">


                      <i class="fa fa-folder"></i> <span>Pagos</span>
                      <i class="fa fa-angle-left pull-right"></i>


                     </a>
                     <ul class="treeview-menu">

                @can('pdfpagosingresos')
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                @endcan
                @can('pdfpagosegresos')
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Salidas</a></li>
                @endcan

                    </ul>
                  </li>

                @can('pdfpagos')
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Pagos</a></li>
                @endcan
                @can('pdfctascteschoferes')
                <li><a href="/reportes/ctasctescho"><i class="fa fa-circle-o"></i> Ctas Ctes. Choferes</a></li>
                @endcan
                @can('pdfctasctesclientes')
                <li><a href="/reportes/ctasctesc"><i class="fa fa-circle-o"></i> Ctas Ctes. Clientes</a></li>
                @endcan
                @can('pdfctasctesproveedores')
                <li><a href="/reportes/ctasctesp"><i class="fa fa-circle-o"></i> Ctas Ctes. Proveedores</a></li>
                @endcan
                @can('pdfarticulosclientes')
                <li><a href="/reportes/articulos"><i class="fa fa-circle-o"></i> Articulos por Clientes</a></li>
                @endcan
                @can('pdfpallets')
                <li><a href="/reportes/pallets"><i class="fa fa-circle-o"></i> Pallets</a></li>
                @endcan
                @can('pdfmantenimientoscamiones')
                <li><a href="/reportes/mantenimientocamion"><i class="fa fa-circle-o"></i> Mantenimiento de Camion</a></li>
                @endcan
                @can('pdfmovimientosarticulos')
                <li><a href="/reportes/movimientosarticulos"><i class="fa fa-circle-o"></i> Movimientos de Articulos</a></li>
                @endcan
                @can('pdffacturas')
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Facturas</a></li>
                @endcan
                @can('pdfcierrescajas')
                <li><a href="/reportes/cierresdecaja"><i class="fa fa-circle-o"></i> Cierres de Caja</a></li>
                @endcan
                @can('pdffletes')
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Fletes</a></li>
                @endcan
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema Integral de Transportes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                                @include('flash::message')
                              	@yield('contenido')
                                @yield('contenidologin')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2020 <a href="#">DELFA Informatica.</a>.</strong> Todos los derechos reservados.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/submit.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/lte/select2/dist/js/select2.min.js')}}"></script>
    
    
    <script>
      $(document).ready(function(){
      $("select").select2({
        width: '100%'
        });
      });
    </script>


    @yield("script")

  </body>
</html>
