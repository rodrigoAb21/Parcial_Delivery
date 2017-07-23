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


Auth::routes();



/************************** vistas para el cliente *******************************/
Route::get('/', function () {
    return view('cliente/anuncios');
});

Route::get('/productos/hamburguesas', 'CProductosController@hamburguesas');
Route::get('/productos/pollos', 'CProductosController@pollos');
Route::get('/productos/combos', 'CProductosController@combos');
Route::get('/productos/complementos', 'CProductosController@complementos');
Route::get('/productos/bebidas', 'CProductosController@bebidas');


//*********************************************************************************


//*********************************ADMIN*******************************************

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');

Route::get('/admin/{slug?}', function () {
    return view('admin');
})->middleware('auth');


Route::resource('admin/pedidos/zona', 'ZonaController');
Route::resource('admin/pedidos/tipo', 'TipoController');
Route::resource('admin/pedidos/estado', 'EstadoController');
Route::resource('admin/pedidos/producto', 'ProductoController');
Route::resource('admin/pedidos/pedido', 'PedidoController');

//*********************************************************************************

Route::get('/{slug?}', function (){
    return view('cliente/anuncios');
});