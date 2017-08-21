<?php

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//####### RUTAS TERCEROS ##########//
//lista de terceros
Route::get('/terceros','TercerosController@index');
//Formularios para tercero nuevo
Route::get('/terceros/nuevo',function(){
    $ciudades = intransporte\Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
   return view('terceros.nuevo', ['ciudades'=>$ciudades]);
});
//Formulario editar tercero
Route::get('/terceros/editar/{id}','TercerosController@editarForm');
//Guardar tercero
Route::post('/terceros/nuevo/guardar','TercerosController@guardar');
//Guardar tercero
Route::post('/terceros/editar/guardar','TercerosController@editar');


//####### RUTAS VEHICULOS ##########//
Route::get('vehiculoHabilitar/{id}','VehiculoController@habilitar');
Route::resource('vehiculo','VehiculoController');
Route::get('vehiculo/asignacion/lista','VehiculoController@listaAsignacion');
Route::post('vehiculo/asignacion/asignar','VehiculoController@asignarConductor');
Route::get('vehiculo/gastos/lista','VehiculoController@listaGastosVehiculos');
Route::post('vehiculo/gastos/guardar','VehiculoController@guardarGastosVehiculos');

//####### RUTAS PRODUCTOS ##########//
Route::get('/productos','ProductoController@index');
Route::get('/productos/nuevo',function(){
    $ciudades = intransporte\Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
    return view('productos.nuevo',['ciudades'=>$ciudades]);});
Route::post('/productos/nuevo/guardar','ProductoController@guardar');
Route::get('/productos/editar/{id}','ProductoController@editar');
Route::post('/productos/editar/guardar','ProductoController@guardarEditar');


//####### RUTAS OBRAS ##########//
Route::get('/obras', 'ObraController@index');
Route::get('/obras/nuevo',function(){
    $terceros = intransporte\Tercero::OrderBy('nombre','ASC')->get();
    $ciudades = intransporte\Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
    return view('obras.nuevo', ['ciudades'=>$ciudades, 'terceros'=>$terceros]);
});
Route::get('/obras/nuevo/{tercero}',function($tercero){
    $terceros = intransporte\Tercero::OrderBy('nombre','ASC')->get();
    $ciudades = intransporte\Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
    return view('obras.nuevo', ['ciudades'=>$ciudades, 'terceros'=>$terceros, 'tercero_seleccionado'=>$tercero]);
});
Route::post('/obras/nuevo/guardar','ObraController@guardar');
Route::get('/obras/editar/{id}','ObraController@editar');
Route::post('/obras/editar/guardar','ObraController@guardarEditar');

//####### RUTAS DESPACHOS ##########//
Route::get('nuevo_despacho','DespachoController@index');
Route::post('consultarObras','DespachoController@consultarObras');
Route::post('addProducto','DespachoController@store');
Route::post('cartConsulta','DespachoController@cartConsulta');
Route::post('actualizarCantidad','DespachoController@update');
Route::post('eliminarProducto','DespachoController@destroy');
Route::post('factutarProductos','DespachoController@facturar');
Route::post('despachar','DespachoController@despachar');
Route::get('invoice/{id}','DespachoController@invoice');
Route::get('listaDespachos','DespachoController@listaDespachos');
Route::post('actualizarPrecio','DespachoController@actualizarPrecio');


//####### RUTAS REPORTES GENERALES ##########//

Route::get('reporte/general/productos','ReporteGeneral@indexProductos');
Route::post('reporte/general/productos','ReporteGeneral@generarProductos');

Route::get('reporte/general/obras','ReporteGeneral@indexObras');
Route::post('reporte/general/obras','ReporteGeneral@generarObras');

Route::get('reporte/general/vehiculos','ReporteGeneral@indexVehiculos');
Route::post('reporte/general/vehiculos','ReporteGeneral@generarVehiculos');

//####### RUTAS REPORTES ESPECIFICOS ##########//

Route::get('reporte/especifico/producto','ReporteEspecificoController@indexProducto');


//**factuacion**//
Route::get('facturacion','FacturacionController@index');
//**factuacion**//