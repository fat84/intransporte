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
//Guardar tercero
Route::post('/terceros/nuevo/guardar','TercerosController@guardar');

//vehiculos
//Route::get('vehiculo');
Route::resource('vehiculo','VehiculoController');
