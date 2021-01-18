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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
//urls de navegacion
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/producto','ProductoController@index')->name('producto');
Route::get('/cliente','ClienteController@index')->name('cliente');
Route::get('/documento','DocumentoController@index')->name('documento');
Route::get('/admin_cliente', 'AdminClienteController@index')->name('admin_cliente');
Route::get('/admin_producto', 'AdminProductoController@index')->name('admin_producto');
//creacion de cliente
Route::get('/obtenerRegiones','RegionController@getRegiones')->name('obtenerRegiones');
Route::post('/obtenerProvincias','ProvinciaController@getProvincias')->name('obtenerProvincias');
Route::post('/obtenerComunas','ComunaController@getComunas')->name('obtenerComunas');
Route::post('/crearCliente','ClienteController@setCliente')->name('crearCliente');
Route::post('/eliminarCliente','ClienteController@removeCliente')->name('eliminarCliente');

//creacion de producto
Route::get('/obtenerTiposDeProducto','TipoProductoController@getTiposDeProducto')->name('obtenerTiposDeProducto');
Route::post('/crearProducto','ProductoController@setProducto')->name('crearProducto');
Route::post('/eliminarProducto','ProductoController@removeProducto')->name('eliminarProducto');

