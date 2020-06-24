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
    return view('welcome');
});

Route::get('/productos', function () {
    return ('Listado de productos(post)');
});

Route::post('/productos', function () {
    return ('Almacenando productos(post)');
});

Route::put('/productos/{id}', function ($id) {
    return ('Almacenando productos(post)'.$id);
});

Route::get('/saludo/{nombre}/{apodo}', function ($nombre,$apodo=null) {
    $nombre=ucfirst($nombre);
    if ($apodo) {
    	return "Bienvenido {$nombre}, tu apodo es {$apodo}";
    }else{
    	return "Bienvenido {$nombre}";
    }
});

//Vista para el controlador de empleados
Route::resource('empleados','EmpleadosController');

//Metodos para obtencion, guardado y eliminacion de datos:
//get, post *guardar*, put, delete
