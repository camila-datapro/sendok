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

Route::get('/plantilla', 'PlantillaController@index')->name('plantilla');
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
Route::post('/getCliente','ClienteController@getCliente')->name('getCliente');

//creacion de producto
Route::get('/obtenerTiposDeProducto','TipoProductoController@getTiposDeProducto')->name('obtenerTiposDeProducto');
Route::post('/crearProducto','ProductoController@setProducto')->name('crearProducto');
Route::post('/eliminarProducto','ProductoController@removeProducto')->name('eliminarProducto');
Route::post('/getProducto','ProductoController@getProducto')->name('getProducto');
Route::post('/listProductos','ProductoController@listProductos')->name('listProductos');
Route::post('/insertarProductos','ProductoController@insertarProductos')->name('insertarProductos');

// admin documento
Route::get('/admin_documentos', 'AdminDocumentoController@index')->name('admin_documentos');

Route::get('/ingreso_masivo', 'IngresoMasivoController@index')->name('ingreso_masivo');

Route::post('/enviarPropuesta', 'DocumentoController@enviarPropuesta')->name('enviarPropuesta');

Route::post('/guardarPDF', 'DocumentoController@guardarPDF')->name('guardarPDF');

Route::post('/guardarPDFProducto', 'DocumentoController@guardarPDFProducto')->name('guardarPDFProducto');

Route::post('/setPropuesta', 'PropuestaController@setPropuesta')->name('setPropuesta');
Route::post('/updatePropuesta', 'PropuestaController@updatePropuesta')->name('updatePropuesta');
Route::post('/setEstadoEnviado', 'PropuestaController@setEstadoEnviado')->name('setEstadoEnviado');
Route::post('/propuestaLastId', 'PropuestaController@getLastId')->name('propuestaLastId');



Route::post('/almacenaPDF','ProductoController@almacenaPDF')->name('almacenaPDF');
