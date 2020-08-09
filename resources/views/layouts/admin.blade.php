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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/lte/select2/dist/css/select2.min.css')}}">

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
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">Desarrollando Software</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                     Alejandro Gianuzzi Prog. Universitario
                      <small>Telefono: 381-5445565</small>
                      <small>San Miguel de Tucuman - Tucuman</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
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
                <li><a href="/abms/acoplados"><i class="fa fa-circle-o"></i> Acoplados</a></li>
                <li><a href="/abms/articulos"><i class="fa fa-circle-o"></i> Articulos</a></li>
                <li><a href="/abms/bancos"><i class="fa fa-circle-o"></i> Bancos</a></li>
                <li><a href="/abms/bienesdeuso"><i class="fa fa-circle-o"></i> Bienes de Uso</a></li>
                <li><a href="/abms/cajas"><i class="fa fa-circle-o"></i> Cajas</a></li>
                <li><a href="/abms/camiones"><i class="fa fa-circle-o"></i> Camiones</a></li>
                <li><a href="/abms/categorias"><i class="fa fa-circle-o"></i> Categorias de Articulos</a></li>
                <li><a href="/abms/choferes"><i class="fa fa-circle-o"></i> Choferes</a></li>
                <li><a href="/abms/clientes"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="/abms/cuentasbancariaspropias"><i class="fa fa-circle-o"></i> Cuentas Bancarias Propias</a></li>
                <li><a href="/abms/cuentasbancariasproveedores"><i class="fa fa-circle-o"></i> Cuentas Bancarias Proveedores</a></li>
                <li><a href="/abms/estaciones"><i class="fa fa-circle-o"></i> Estaciones de Servicio</a></li>
                <li><a href="/abms/proveedores"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                <li><a href="/abms/repuestos"><i class="fa fa-circle-o"></i> Repuestos</a></li>
                <li><a href="/abms/tarifas"><i class="fa fa-circle-o"></i> Tarifas de Fletes</a></li>
                <li><a href="/abms/vehiculosparticulares"><i class="fa fa-circle-o"></i> Vehiculos Particulares</a></li>
                <li><a href="/abms/afipprestamosmoratorias"><i class="fa fa-circle-o"></i> Afip Moratoria/Plan Pago</a></li>
                <li><a href="/abms/rentasprestamosmoratorias"><i class="fa fa-circle-o"></i> Rentas Moratoria/Plan Pago</a></li>
                <li><a href="/abms/prestamos"><i class="fa fa-circle-o"></i> Prestamos</a></li>

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
                <li><a href="/movimientos/articulos"><i class="fa fa-circle-o"></i> Ingreso y Egreso Stock</a></li>
                <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Ingreso y Egreso Pallet</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Cuentas Corrientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Fact. Proveedores</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Mantenimiento</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Acoplados</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Camion</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Finanzas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/finanzas/movimientoscajas/iniciar"><i class="fa fa-circle-o"></i> Movimientos de Caja</a></li>
                <li><a href="/finanzas/chequesterceros"><i class="fa fa-circle-o"></i> Cheque Tercero</a></li>
                <li><a href="/finanzas/cierrecajas"><i class="fa fa-circle-o"></i> Cierres de Caja{FALTA}</a></li>
                <li><a href="/finanzas/movimientoscajas/ingresarchequepropio"><i class="fa fa-circle-o"></i> Cobro de Cheques</a></li>
                <li><a href="/finanzas/chequespropios"><i class="fa fa-circle-o"></i> Ingreso de Cheques Propios</a></li>
                <li><a href="/finanzas/movimientoscajas/ingresartransferencia"><i class="fa fa-circle-o"></i> Transferencias de Cajas</a></li>
                <!--<li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> ***** Cuentas Bancarias falta</a></li>-->
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Pagos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/pagos/cheque"><i class="fa fa-circle-o"></i> Cheques</a></li>
                <li><a href="/pagos/chequepropio"><i class="fa fa-circle-o"></i> Cheques Propios</a></li>
                <li><a href="/pagos/pagoefectivo"><i class="fa fa-circle-o"></i> Efectivo</a></li>
                <li><a href="/pagos/prestamo"><i class="fa fa-circle-o"></i> Prestamos</a></li>
                <li><a href="/pagos/transferencia"><i class="fa fa-circle-o"></i> Transferencias</a></li>
                
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Fletes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Iniciar</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Fletes</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Consultas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Mantenimiento Acoplados</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Stock</a></li>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span>Pagos</span>
                      <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Salidas</a></li>
                    </ul>
                  </li>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span>Pallet</span>
                      <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Salidas</a></li>
                    </ul>
                </li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Pagos</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Facturas</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Cierres de Caja</a></li>
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Fletes</a></li>
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
