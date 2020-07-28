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
	if (Auth::check()) {
		return view('contenido.contenidodashboard');
	}else{
		return redirect('login');
	}
    
});

Route::get('/index', function () {
    if (Auth::check()) {
		return view('contenido.contenidodashboard');
	}else{
		return redirect('login');
	}
});

Route::get('/login', function(){
	if (Auth::check()) {
		return view('contenido.contenidodashboard');
	}else{
		return redirect('login');
	}
});

//para obtener datos de usuario
Route::get('/usuarios/{id}', 'UsuariosController@getuser');

//para actualizar datos de usaurio
Route::put('/usuarios', 'UsuariosController@update');

//para obtener a los usuarios administradores
Route::get('/usuariosadmin', 'UsuariosController@getadminusers');

//ruta para vista de usuairos
Route::get('/users', function () {
    return view('contenido.usuarioscontenido');
});

//ruta para vista de empresas
Route::get('/empresasv', function () {
    return view('contenido.empresascontenido');
});

//ruta para vista de empresas
Route::get('/categoriasev', function () {
    return view('contenido.categoriasecontenido');
});

//para obtener datos de usuario
Route::get('/empresas/{id}', 'EmpresasController@getempresa');

//ruta para actualizar una empresa
Route::put('/empresas', 'EmpresasController@update');

//ruta para obtener la empresa asociada al usuario actual
Route::get('/getempresaact', 'EmpresasController@empresaact');

//ruta para obtener las empresas
Route::get('/getempresas', 'EmpresasController@empresasall');

Route::get('/productosv', function () {
    return view('contenido.productoscontenido');
});

Route::get('/sproductosv', function () {
    return view('contenido.productossupercontenido');
});

//para obtener datos de un producto
Route::get('/productos/{id}', 'ProductosController@getproducto');

//ruta para actualizar un producto
Route::put('/productos', 'ProductosController@update');

//ruta para actualizar una categoria de empresa
Route::put('/categoriase', 'CategoriasEmpresasController@update');

//para obtener datos de todos los productos de todas las empresas
Route::get('/productosall', 'ProductosController@getallproductos');

//Route::get('/getusers','UsuariosController@getUsuarios');

//Route::post('/getusers', 'UsuariosController@store');

//Route::delete('/deleteusers/{id}', 'UsuariosController@destroy');

Route::apiResource('usuarios', 'UsuariosController');

Route::apiResource('empresas', 'EmpresasController');

Route::apiResource('ubicacion', 'UbicacionController');

Route::apiResource('categoriase', 'CategoriasEmpresasController');

Route::apiResource('categoriasp', 'CategoriasProductosController');

Route::apiResource('productos', 'ProductosController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
