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
Route::post('/obras/nuevo/guardar','ObraController@guardar');
Route::get('/obras/editar/{id}','ObraController@editar');
Route::post('/obras/editar/guardar','ObraController@guardarEditar');