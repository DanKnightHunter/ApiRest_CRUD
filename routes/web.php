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
    return view('welcome');
});

Route::get('/articulos', 'ArticulosController@mostrar');
Route::post('/articulos', 'ArticulosController@registrar');
Route::put('/articulos/{id}', 'ArticulosController@modificar');
Route::delete('/articulos/{id}', 'ArticulosController@eliminar');

//Route::resource('articulos', 'ArticulosController');
