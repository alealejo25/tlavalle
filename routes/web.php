<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','InicioController@index');

/*Route::get('/abms/camiones','CamionController@index');
Route::get('/abms/camiones/create','CamionController@create');*/
Route::resource('abms/camiones','CamionController'); /*->middleware('auth');/*este tiene que estar logueado*/
Route::resource('abms/acoplados','AcopladoController');
Route::resource('abms/choferes','ChoferController');
Route::resource('abms/tarifas','TarifaController');
Route::resource('abms/estaciones','EstacionController');
Route::resource('abms/categorias','CategoriaController');
Route::resource('abms/articulos','ArticuloController');
Route::resource('abms/clientes','ClienteController');
Route::resource('abms/bancos','BancoController');
Route::resource('abms/repuestos','RepuestoController');
Route::resource('abms/cajas','CajaController');
Route::resource('abms/proveedores','ProveedorController');
Route::resource('abms/cuentasbancariasproveedores','CuentaBancariaProveedorController');
Route::resource('abms/vehiculosparticulares','VehiculoParticularController');
Route::resource('abms/bienesdeuso','BienDeUsoController');
Route::resource('abms/cuentasbancariaspropias','CuentaBancariaPropiaController');
Route::resource('abms/afipprestamosmoratorias','AfipPrestamoMoratoriaController');
Route::resource('abms/rentasprestamosmoratorias','RentaPrestamoMoratoriaController');
Route::resource('abms/prestamos','PrestamoController');



Route::resource('movimientos/articulos','MovimientoArticuloController');
Route::get('movimientos/articulos/listar','MovimientoArticuloController@show');


Route::get('finanzas/movimientoscajas/iniciar','MovimientoCajaController@iniciar');
Route::get('finanzas/movimientoscajas/ingresartransferencia','MovimientoCajaController@ingresartransferencia');
Route::post('finanzas/movimientoscajas/guardartransferencia','MovimientoCajaController@guardartransferencia')->name('guardartransferencia');
Route::get('finanzas/movimientoscajas/ingresarchequepropio','MovimientoCajaController@ingresarchequepropio');
Route::post('finanzas/movimientoscajas/guardarchequepropio','MovimientoCajaController@guardarchequepropio')->name('guardarchequepropio');
Route::resource('finanzas/movimientoscajas','MovimientoCajaController');
Route::resource('finanzas/chequesterceros','ChequeTerceroController');
Route::resource('finanzas/cierrecajas','CierreCajaController');
Route::resource('finanzas/chequespropios','ChequePropioController');


Route::get('pagos/pagoefectivo','PagoController@pagoefectivo');
Route::post('pagos/guardarpagoefectivo','PagoController@guardarpagoefectivo')->name('guardarpagoefectivo');
Route::get('pagos/cheque','PagoController@cheque');
Route::post('pagos/guardarpagocheque','PagoController@guardarpagocheque')->name('guardarpagocheque');
Route::get('pagos/chequepropio','PagoController@chequepropio');
Route::post('pagos/guardarpagochequepropio','PagoController@guardarpagochequepropio')->name('guardarpagochequepropio');
Route::get('pagos/transferencia','PagoController@transferencia');
Route::post('pagos/guardarpagotransferencia','PagoController@guardarpagotransferencia')->name('guardarpagotransferencia');



Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', 'CamionController@index')->name('home'); //cuando se loguea me lleva a esa direccion

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
