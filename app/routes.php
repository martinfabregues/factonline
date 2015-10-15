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
	return View::make('home');
});

Route::resource('puntosventa', 'PuntoVentaController');
Route::resource('clientes', 'ClienteController');
Route::resource('proveedores', 'ProveedorController');
Route::resource('facturas', 'FacturaController');
Route::resource('productos', 'ProductoController');

Route::get('clientes/BuscarCliente', 'ClienteController@BuscarCliente');