<?php
// Web
Route::get('/', 'WebController@index');
Route::get('/servicios/{slug}', 'WebController@service');
Route::get('/blog', 'WebController@blog');
Route::get('/blog/{slug}', 'WebController@blog_show');
Route::post('/contacto', 'WebController@contact');
// Usuarios
Route::get('/iniciar-sesion', 'UserController@index');
Route::get('/cerrar-sesion', 'UserController@signout');
Route::get('/crear-cuenta', 'UserController@signup');
Route::post('/signin', 'UserController@signin');
Route::post('/signup', 'UserController@store');
// Escritorio
Route::prefix('escritorio')->middleware('main.auth')->group(function() {
	Route::get('/', 'DashController@index');
	// Usuarios
	Route::prefix('usuarios')->group(function() {
		Route::get('/', 'DashController@users');
		Route::get('/editar/{id}', 'DashController@users_edit');
		Route::post('/actualizar/{id}', 'DashController@users_update');
	});
	// Cabeceras
	Route::prefix('cabecera')->group(function() {
		Route::get('/', 'DashController@header');
		Route::get('/crear', 'DashController@header_create');
		Route::post('/almacenar', 'DashController@header_store');
		Route::get('/editar/{id}', 'DashController@header_edit');
		Route::post('/actualizar/{id}', 'DashController@header_update');
	});
	// Nosotros
	Route::prefix('nosotros')->group(function() {
		Route::get('/{id}', 'DashController@about_edit');
		Route::post('/actualizar/{id}', 'DashController@about_update');
	});
	// Servicios
	Route::prefix('servicios')->group(function() {
		Route::get('/', 'DashController@services');
		Route::get('/crear', 'DashController@services_create');
		Route::post('/almacenar', 'DashController@services_store');
		Route::get('/editar/{id}', 'DashController@services_edit');
		Route::post('/actualizar/{id}', 'DashController@services_update');
	});
	// Blog
	Route::prefix('blog')->group(function() {
		Route::get('/', 'DashController@blog');
		Route::get('/crear', 'DashController@blog_create');
		Route::post('/almacenar', 'DashController@blog_store');
		Route::get('/editar/{id}', 'DashController@blog_edit');
		Route::post('/actualizar/{id}', 'DashController@blog_update');
	});
	// Contacto
	Route::prefix('pie')->group(function() {
		Route::get('/{id}', 'DashController@contact_edit');
		Route::post('/actualizar/{id}', 'DashController@contact_update');
	});
});