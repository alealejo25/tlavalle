<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Caja;



class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
   public function run()
    {

		DB::table('cajas')->insert([
        'denominacion'  => 'CAJA RECEPCION',
        'descripcion'  => 'CAJA NATALI',
        'condicion'     => '0',
    ]);
		DB::table('cajas')->insert([
        'denominacion'  => 'CAJA TRANSPORTE LAVALLE',
        'descripcion'  => 'CAJA CRISTIAN Y JESICA',
        'condicion'     => '0',
    ]);


 		DB::table('users')->insert([
        'name'  => 'Jesica Alburquerque',
        'Tipo'  => 'Admin',
        'email'     => 'jesalb@transportelavalle.com',
        'password'  => bcrypt('jesi9534'),
    ]);

 		 DB::table('users')->insert([
        'name'  => 'Cristian Alburquerque',
        'Tipo'  => 'Admin',
        'email'     => 'crialb@transportelavalle.com',
        'password'  => bcrypt('cris5813'),
    ]);

 	DB::table('users')->insert([
        'name'  => 'Alejandro Gianuzzi',
        'Tipo'  => 'Admin',
        'email'     => 'admin@transportelavalle.com',
        'password'  => bcrypt('Tlavalle123$'),
    ]);

     DB::table('users')->insert([
        'name'  => 'Natali Alburquerque',
        'Tipo'  => 'Admin',
        'email'     => 'natalb@transportelavalle.com',
        'password'  => bcrypt('nata1351'),
    ]);

    DB::table('users')->insert([
        'name'  => 'Logistica',
        'Tipo'  => 'Logistica',
        'email'     => 'logistica@transportelavalle.com',
        'password'  => bcrypt('logistica8733'),
    ]);

    DB::table('users')->insert([
        'name'  => 'Alejandro Gomez',
        'Tipo'  => 'Taller',
        'email'     => 'alegom@transportelavalle.com',
        'password'  => bcrypt('alegom6751'),
    ]);

    DB::table('users')->insert([
        'name'  => 'Consulta',
        'Tipo'  => 'Consulta',
        'email'     => 'consulta@transportelavalle.com',
        'password'  => bcrypt('consulta'),
    ]);

     DB::table('provincias')->insert([
        'nombre'  => 'Buenos Aires',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Buenos Aires-GBA',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Capital Federal',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Catamarca',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Chaco',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Chubut',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Córdoba',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Entre Ríos',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Formosa',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Jujuy',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'La Rioja',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Neuquén',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Misiones',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Río Negro',
     ]);
          DB::table('provincias')->insert([
        'nombre'  => 'Salta',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'San Juan',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'San Luis',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Santa Cruz',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Santa Fe',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Santiago del Estero',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Tierra del Fuego',
     ]);
     DB::table('provincias')->insert([
        'nombre'  => 'Tucumán',
     ]);


		//Lista de permisos
		Permission::Create(['name' =>'acoplados_index']);
		Permission::Create(['name' =>'acoplados_create']);
		Permission::Create(['name' =>'acoplados_edit']);
		Permission::Create(['name' =>'acoplados_destroy']);
		Permission::Create(['name' =>'articulos_index']);
		Permission::Create(['name' =>'articulos_create']);
		Permission::Create(['name' =>'articulos_edit']);
		Permission::Create(['name' =>'articulos_destroy']);
		Permission::Create(['name' =>'bancos_index']);
		Permission::Create(['name' =>'bancos_create']);
		Permission::Create(['name' =>'bancos_edit']);
		Permission::Create(['name' =>'bancos_destroy']);
		Permission::Create(['name' =>'afipprestamosmoratorias_index']);
		Permission::Create(['name' =>'afipprestamosmoratorias_create']);
		Permission::Create(['name' =>'afipprestamosmoratorias_edit']);
		Permission::Create(['name' =>'afipprestamosmoratorias_destroy']);
		Permission::Create(['name' =>'bienesdeuso_index']);
		Permission::Create(['name' =>'bienesdeuso_create']);
		Permission::Create(['name' =>'bienesdeuso_edit']);
		Permission::Create(['name' =>'bienesdeuso_destroy']);
		Permission::Create(['name' =>'cajas_index']);
		Permission::Create(['name' =>'cajas_create']);
		Permission::Create(['name' =>'cajas_edit']);
		Permission::Create(['name' =>'cajas_destroy']);
		Permission::Create(['name' =>'camiones_index']);
		Permission::Create(['name' =>'camiones_create']);
		Permission::Create(['name' =>'camiones_edit']);
		Permission::Create(['name' =>'camiones_destroy']);
		Permission::Create(['name' =>'categorias_index']);
		Permission::Create(['name' =>'categorias_create']);
		Permission::Create(['name' =>'categorias_edit']);
		Permission::Create(['name' =>'categorias_destroy']);
    	Permission::Create(['name' =>'choferes_index']);
		Permission::Create(['name' =>'choferes_create']);
		Permission::Create(['name' =>'choferes_edit']);
		Permission::Create(['name' =>'choferes_destroy']);
		Permission::Create(['name' =>'clientes_index']);
		Permission::Create(['name' =>'clientes_create']);
		Permission::Create(['name' =>'clientes_edit']);
		Permission::Create(['name' =>'clientes_destroy']);
		Permission::Create(['name' =>'cuentasbancariaspropias_index']);
		Permission::Create(['name' =>'cuentasbancariaspropias_create']);
		Permission::Create(['name' =>'cuentasbancariaspropias_edit']);
		Permission::Create(['name' =>'cuentasbancariaspropias_destroy']);
		Permission::Create(['name' =>'cuentasbancariasproveedores_index']);
		Permission::Create(['name' =>'cuentasbancariasproveedores_create']);
		Permission::Create(['name' =>'cuentasbancariasproveedores_edit']);
		Permission::Create(['name' =>'cuentasbancariasproveedores_destroy']);
		Permission::Create(['name' =>'estaciones_index']);
		Permission::Create(['name' =>'estaciones_create']);
		Permission::Create(['name' =>'estaciones_edit']);
		Permission::Create(['name' =>'estaciones_destroy']);
		Permission::Create(['name' =>'prestamos_index']);
		Permission::Create(['name' =>'prestamos_create']);
		Permission::Create(['name' =>'prestamos_edit']);
		Permission::Create(['name' =>'prestamos_destroy']);
		Permission::Create(['name' =>'proveedores_index']);
		Permission::Create(['name' =>'proveedores_create']);
		Permission::Create(['name' =>'proveedores_edit']);
		Permission::Create(['name' =>'proveedores_destroy']);
		Permission::Create(['name' =>'rentasprestamosmoratorias_index']);
		Permission::Create(['name' =>'rentasprestamosmoratorias_create']);
		Permission::Create(['name' =>'rentasprestamosmoratorias_edit']);
		Permission::Create(['name' =>'rentasprestamosmoratorias_destroy']);
		Permission::Create(['name' =>'repuestos_index']);
		Permission::Create(['name' =>'repuestos_create']);
		Permission::Create(['name' =>'repuestos_edit']);
		Permission::Create(['name' =>'repuestos_destroy']);
		Permission::Create(['name' =>'roles_index']);
		Permission::Create(['name' =>'roles_create']);
		Permission::Create(['name' =>'roles_edit']);
		Permission::Create(['name' =>'roles_destroy']);
		Permission::Create(['name' =>'vehiculosparticulares_index']);
		Permission::Create(['name' =>'vehiculosparticulares_create']);
		Permission::Create(['name' =>'vehiculosparticulares_edit']);
		Permission::Create(['name' =>'vehiculosparticulares_destroy']);
		Permission::Create(['name' =>'tarifas_index']);
		Permission::Create(['name' =>'tarifas_create']);
		Permission::Create(['name' =>'tarifas_edit']);
		Permission::Create(['name' =>'tarifas_destroy']);

		
		Permission::Create(['name' =>'movimientosarticulos']);
		Permission::Create(['name' =>'edicionmovimientoarticulo']);
		Permission::Create(['name' =>'movimientospallets']);

		Permission::Create(['name' =>'ctasctesclientes']);
		Permission::Create(['name' =>'ctascteschoferes']);
		Permission::Create(['name' =>'ctasctesproveedores']);

		Permission::Create(['name' =>'mantenimientocamion']);
		Permission::Create(['name' =>'listarmantenimientocamion']);

		Permission::Create(['name' =>'anticiposchoferes']);
		Permission::Create(['name' =>'prestamochoferes']);		
		Permission::Create(['name' =>'listarprestamochoferes']);		

		Permission::Create(['name' =>'chequeterceros']);
		Permission::Create(['name' =>'cierresdecaja']);		
		Permission::Create(['name' =>'cobrochequepropio']);
		Permission::Create(['name' =>'ingresochequepropio']);
		Permission::Create(['name' =>'ingresochequetercero']);		
		Permission::Create(['name' =>'movimientoscaja']);
		Permission::Create(['name' =>'transferenciascaja']);


		Permission::Create(['name' =>'opchoferes']);		
		Permission::Create(['name' =>'opproveedores']);
		Permission::Create(['name' =>'op']);

		Permission::Create(['name' =>'iniciarflete']);
		Permission::Create(['name' =>'listarfletes']);

		//consultas PDF -------------------------------------------
		Permission::Create(['name' =>'pdfmantenimientos']);
		Permission::Create(['name' =>'pdfstock']);
		Permission::Create(['name' =>'pdfpagosingresos']);
		Permission::Create(['name' =>'pdfpagosegresos']);
		Permission::Create(['name' =>'pdfpagos']);
		Permission::Create(['name' =>'pdfctasctesclientes']);
		Permission::Create(['name' =>'pdfctasctesproveedores']);
		Permission::Create(['name' =>'pdfctascteschoferes']);
		Permission::Create(['name' =>'pdfarticulosclientes']);
		Permission::Create(['name' =>'pdfpallets']);
		Permission::Create(['name' =>'pdfmantenimientoscamiones']);
		Permission::Create(['name' =>'pdfmovimientosarticulos']);
		Permission::Create(['name' =>'pdffacturas']);
		Permission::Create(['name' =>'pdfcierrescajas']);
		Permission::Create(['name' =>'pdffletes']);

		//para usar
		Permission::Create(['name' =>'administradores']);
		Permission::Create(['name' =>'taller']);
		Permission::Create(['name' =>'administracion']);
		Permission::Create(['name' =>'logistica']);
		Permission::Create(['name' =>'consulta']);
		Permission::Create(['name' =>'tallerlogistica']);
		Permission::Create(['name' =>'talleradministracion']);
		Permission::Create(['name' =>'administracionlogistica']);
		Permission::Create(['name' =>'inicio']);

		//menus
		Permission::Create(['name' =>'abms']);
		Permission::Create(['name' =>'operaciones']);
		Permission::Create(['name' =>'cuentascorrientes']);
		Permission::Create(['name' =>'mantenimiento']);
		Permission::Create(['name' =>'choferes']);
		Permission::Create(['name' =>'finanzas']);
		Permission::Create(['name' =>'pagos']);
		Permission::Create(['name' =>'fletes']);
		Permission::Create(['name' =>'consultas']);



		//---------------------------------------------------------
		$admin=Role::create(['name'=>'Admin']);
		$logistica=Role::create(['name'=>'Logistica']);
		$administracion=Role::create(['name'=>'Administracion']);
		$taller=Role::create(['name'=>'Taller']);
		$consulta=Role::create(['name'=>'Consulta']);


		$admin->givePermissionTo([
			'acoplados_index',
			'acoplados_create',
			'acoplados_edit',
			'acoplados_destroy',
			'articulos_index',
			'articulos_create',
			'articulos_edit',
			'articulos_destroy',
			'bancos_index',
			'bancos_create',
			'bancos_edit',
			'bancos_destroy',
			'afipprestamosmoratorias_index',
			'afipprestamosmoratorias_create',
			'afipprestamosmoratorias_edit',
			'afipprestamosmoratorias_destroy',
			'bienesdeuso_index',
			'bienesdeuso_create',
			'bienesdeuso_edit',
			'bienesdeuso_destroy',
			'cajas_index',
			'cajas_create',
			'cajas_edit',
			'cajas_destroy',
			'camiones_index',
			'camiones_create',
			'camiones_edit',
			'camiones_destroy',
			'categorias_index',
			'categorias_create',
			'categorias_edit',
			'categorias_destroy',
			'choferes_index',
			'choferes_create',
			'choferes_edit',
			'choferes_destroy',
			'clientes_index',
			'clientes_create',
			'clientes_edit',
			'clientes_destroy',
			'cuentasbancariaspropias_index',
			'cuentasbancariaspropias_create',
			'cuentasbancariaspropias_edit',
			'cuentasbancariaspropias_destroy',
			'cuentasbancariasproveedores_index',
			'cuentasbancariasproveedores_create',
			'cuentasbancariasproveedores_edit',
			'cuentasbancariasproveedores_destroy',
			'estaciones_index',
			'estaciones_create',
			'estaciones_edit',
			'estaciones_destroy',
			'prestamos_index',
			'prestamos_create',
			'prestamos_edit',
			'prestamos_destroy',
			'proveedores_index',
			'proveedores_create',
			'proveedores_edit',
			'proveedores_destroy',
			'rentasprestamosmoratorias_index',
			'rentasprestamosmoratorias_create',
			'rentasprestamosmoratorias_edit',
			'rentasprestamosmoratorias_destroy',
			'repuestos_index',
			'repuestos_create',
			'repuestos_edit',
			'repuestos_destroy',
			'roles_index',
			'roles_create',
			'roles_edit',
			'roles_destroy',
			'vehiculosparticulares_index',
			'vehiculosparticulares_create',
			'vehiculosparticulares_edit',
			'vehiculosparticulares_destroy',
			'cuentasbancariaspropias_index',
			'cuentasbancariaspropias_create',
			'cuentasbancariaspropias_edit',
			'cuentasbancariaspropias_destroy',
			'tarifas_index',
			'tarifas_create',
			'tarifas_edit',
			'tarifas_destroy',
			'movimientosarticulos',
			'edicionmovimientoarticulo',
			'movimientospallets',
			'ctasctesclientes',
			'ctascteschoferes',
			'ctasctesproveedores',
			'mantenimientocamion',
			'listarmantenimientocamion',
			'anticiposchoferes',
			'prestamochoferes',
			'listarprestamochoferes',
			'chequeterceros',
			'cierresdecaja',
			'cobrochequepropio',
			'ingresochequepropio',
			'ingresochequetercero',
			'movimientoscaja',
			'transferenciascaja',
			'opchoferes',
			'opproveedores',
			'op',
			'iniciarflete',
			'listarfletes',
			'pdfmantenimientos',
			'pdfstock',
			'pdfpagosingresos',
			'pdfpagosegresos',
			'pdfpagos',
			'pdfctasctesclientes',
			'pdfctasctesproveedores',
			'pdfctascteschoferes',
			'pdfarticulosclientes',
			'pdfpallets',
			'pdfmantenimientoscamiones',
			'pdfmovimientosarticulos',
			'pdffacturas',
			'pdfcierrescajas',
			'pdffletes',
			'administradores',
			'taller',
			'logistica',
			'consulta',
			'administracion',
			'tallerlogistica',
			'talleradministracion',
			'inicio',
		    'administracionlogistica'
		]);

		$logistica->givePermissionTo([
			'iniciarflete',
			'listarfletes',
			'listarmantenimientocamion',
			'choferes_index',
			'acoplados_index',
			'camiones_index',
			'logistica',
			'tallerlogistica',
			'administracionlogistica',
			'pdffletes',
			'pdfmantenimientoscamiones',
			'pdfctascteschoferes',
			'inicio',
			'pdfmantenimientos'
		]);


		$administracion->givePermissionTo([
			'articulos_index',
			'articulos_create',
			'articulos_destroy',
			'acoplados_index',
			'camiones_index',
			'repuestos_index',
			'repuestos_create',
			'repuestos_destroy',
			'movimientosarticulos',
			'edicionmovimientoarticulo',
			'movimientospallets',
			'mantenimientocamion',
			'listarmantenimientocamion',
			'administracionlogistica',
			'administracion',
			'talleradministracion',
			'pdfmantenimientos',
			'pdfstock',
			'pdfarticulosclientes',
			'pdfpallets',
			'pdfmantenimientoscamiones',
			'inicio',
			'pdfmovimientosarticulos'
		]);

		$taller->givePermissionTo([
			'pdfstock',
			'pdfmantenimientoscamiones',
			'pdfmantenimientos',
			'talleradministracion',
			'taller',
			'tallerlogistica',
			'inicio',
			'repuestos_index'
		]);

		$consulta->givePermissionTo([
			'pdfmantenimientos',
			'pdfstock',
			'pdfpagosingresos',
			'pdfpagosegresos',
			'pdfpagos',
			'pdfctasctesclientes',
			'pdfctasctesproveedores',
			'pdfctascteschoferes',
			'pdfarticulosclientes',
			'pdfpallets',
			'pdfmantenimientoscamiones',
			'pdfmovimientosarticulos',
			'pdffacturas',
			'pdfcierrescajas',
			'inicio',
			'pdffletes'
		]);

		$user=User::find(1);//jesi
		$user->assignRole('Admin');
		$user=User::find(2);//Cristian
		$user->assignRole('Admin');
		$user=User::find(3);//Ale
		$user->assignRole('Admin');

		$user=User::find(4);
		$user->assignRole('Admin');

		$user=User::find(5);
		$user->assignRole('Logistica');

		$user=User::find(6);
		$user->assignRole('Taller');

		$user=User::find(7);
		$user->assignRole('Consulta');

	}
}
