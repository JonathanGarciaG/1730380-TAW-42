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

Route::get('/users', function () {
    return view('contenido.usuarioscontenido');
});

Route::get('/empresasv', function () {
    return view('contenido.empresascontenido');
});

//para obtener datos de usuario
Route::get('/empresas/{id}', 'EmpresasController@getempresa');

//ruta para actualizar una empresa
Route::put('/empresas', 'EmpresasController@update');

//ruta para obtener la empresa asociada al usuario actual
Route::get('/getempresaact', 'EmpresasController@empresaact');

Route::get('/productosv', function () {
    return view('contenido.productoscontenido');
});

//para obtener datos de usuario
Route::get('/productos/{id}', 'ProductosController@getproducto');

//ruta para actualizar una empresa
Route::put('/productos', 'ProductosController@update');


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
