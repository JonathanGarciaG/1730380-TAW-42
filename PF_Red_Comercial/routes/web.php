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
    return view('contenido.contenidodashboard');
});

Route::get('/index', function () {
    return view('contenido.contenidodashboard');
});

Route::get('/usuarios', function () {
    return view('contenido.usuarioscontenido');
});

Route::get('/empresas', function () {
    return view('contenido.empresascontenido');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
