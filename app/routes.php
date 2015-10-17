<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('dashboard');
});

//Route::resource('puntosventa', 'PuntoVentaController');
//Route::resource('clientes', 'ClienteController');
//Route::resource('proveedores', 'ProveedorController');
Route::resource('facturas', 'FacturaController');

//ROUTES CLIENTESCONTROLLER
Route::get('clientes', 'ClienteController@index');
Route::get('clientes/create', 'ClienteController@create');
Route::post('store', 'ClienteController@store');
Route::get('clientes/findcliente', 'ClienteController@findcliente');


//ROUTES PRODUCTOCONTROLLER
Route::get('productos', 'ProductoController@index');
Route::get('productos/findproducto', 'ProductoController@findproducto');
Route::get('productos/create', 'ProductoController@create');
Route::post('store', 'ProductoController@store');


//ROUTES PROVEEDORCONTROLLER
Route::get('proveedores', 'ProveedorController@index');
Route::get('proveedores/create', 'ProveedorController@create');
Route::post('store', 'ProveedorController@store');


//ROUTES PUNTOSDEVENTA
Route::get('puntosventa', 'PuntoVentaController@index');
Route::get('puntosventa/create', 'PuntoVentaController@create');
Route::post('store', 'PuntoVentaController@store');