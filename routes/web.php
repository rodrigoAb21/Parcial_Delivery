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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('pedidos/zona', 'ZonaController');
Route::resource('pedidos/estado', 'EstadoController');
Route::resource('pedidos/producto', 'ProductoController');
Route::resource('pedidos/pedido', 'PedidoController');