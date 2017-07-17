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
    return view('cliente/anuncios');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function () {
    return view('admin');
});
Route::get('productos', 'CProductosController@index');



Route::resource('admin/pedidos/zona', 'ZonaController');
Route::resource('admin/pedidos/tipo', 'TipoController');
Route::resource('admin/pedidos/estado', 'EstadoController');
Route::resource('admin/pedidos/producto', 'ProductoController');
Route::resource('admin/pedidos/pedido', 'PedidoController');