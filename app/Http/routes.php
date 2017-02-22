<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses'	=> 'homeController@home',
	'as'	=> 'home'
]);

Route::post('/', [
	'uses'	=> 'homeController@home',
	'as'	=> 'home'
]);

Route::resource('usuarios', 'usersController');
Route::resource('clients', 'ClientsController');
Route::resource('proyects', 'ProyectsController');

//Rutas para borrar

Route::get('votantes/{votante}/destroy', [
	'uses'	=> 'votantesController@destroy',
	'as'	=> 'votantes.destroy'
]);

Route::get('noticias/{noticia}/destroy', [
	'uses'	=> 'noticiasController@destroy',
	'as'	=> 'noticias.destroy'
]);

Route::get('usuarios/{usuario}/destroy', [
	'uses'	=> 'usersController@destroy',
	'as'	=> 'usuarios.destroy'
]);

//Rutas para los reportes

Route::get('pdf/proyectos', [
	'uses'	=> 'estadisticasController@proyectos',
	'as'	=> 'proyectos.pdf',
]);

Route::get('pdf/programadores', [
	'uses'	=> 'estadisticasController@programadores',
	'as'	=> 'programadores.pdf',
]);

Route::get('pdf/clientes', [
	'uses'	=> 'estadisticasController@clientes',
	'as'	=> 'clientes.pdf',
]);