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

//ruta para vista de micrositio
Route::get('/micrositiov', function () {
    return view('contenido.micrositiocontenido');
});

//ruta para vista de empresas
Route::get('/empresasv', function () {
    return view('contenido.empresascontenido');
});

//ruta para vista de categorias de empresas
Route::get('/categoriasev', function () {
    return view('contenido.categoriasecontenido');
});

//ruta para vista de categorias de productos
Route::get('/categoriaspv', function () {
    return view('contenido.categoriaspcontenido');
});

//ruta para vista de ubicaciones de empresas
Route::get('/ubicacionv', function () {
    return view('contenido.ubicacioncontenido');
});

//ruta para vista de imagenes de carusel
Route::get('/imagenessitiov', function () {
    return view('contenido.imagenessitioscontenido');
});

//para obtener datos de usuario
Route::get('/empresas/{id}', 'EmpresasController@getempresa');

//ruta para actualizar una empresa
Route::put('/empresas', 'EmpresasController@update');

//ruta para obtener la empresa asociada al usuario actual
Route::get('/getempresaact', 'EmpresasController@empresaact');

//ruta para obtener el id del micrositio del usuario actual
Route::get('/mysite', 'ImagenesSitioController@mysite');

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

//para obtener datos de un producto
Route::get('/getproductos/{id}', 'ProductosController@getproductos');

//para obtener datos de un producto
Route::get('/buscarproductos/{busqueda}', 'ProductosController@buscar');

//ruta para actualizar un producto
Route::put('/productos', 'ProductosController@update');

//ruta para actualizar una categoria de empresa
Route::put('/categoriase', 'CategoriasEmpresasController@update');

//ruta para actualizar una categoria de productos
Route::put('/categoriasp', 'CategoriasProductosController@update');

//ruta para actualizar una ubicacion
Route::put('/ubicacion', 'UbicacionController@update');

//para obtener datos de todos los productos de todas las empresas
Route::get('/productosall', 'ProductosController@getallproductos');

//para obtener las imagenes de tu sitio
Route::get('/imagenes_sitioe', 'ImagenesSitioController@mysiteimgs');

//para obtener las imagenes de un sitio seleccionado
Route::get('/imagenes_sitioes/{id}', 'ImagenesSitioController@siteimgs');

//Route::get('/getusers','UsuariosController@getUsuarios');

//Route::post('/getusers', 'UsuariosController@store');

//Route::delete('/deleteusers/{id}', 'UsuariosController@destroy');

Route::apiResource('usuarios', 'UsuariosController');

Route::apiResource('empresas', 'EmpresasController');

Route::apiResource('ubicacion', 'UbicacionController');

Route::apiResource('categoriase', 'CategoriasEmpresasController');

Route::apiResource('categoriasp', 'CategoriasProductosController');

Route::apiResource('productos', 'ProductosController');

Route::apiResource('imagenes_productos', 'ImagenesProductosController');

Route::apiResource('imagenes_sitio', 'ImagenesSitioController');

Route::apiResource('micrositios', 'MicrositiosController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
