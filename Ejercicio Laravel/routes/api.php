<?php

use Illuminate\Http\Request;
use App\Empleado;

//COMANDOS
/*
1. Crear migracion
php artisan make:migration Nombre

2. Crear modelo
php artisan make:model Nombre
*/

//Listar empleados
Route::get('empleados',function(){
	$datos['empleados'] = Empleado::get();
	return view('empleados',$datos);
	//return $empleados;
});
//Listar con Controller
//Route::get('empleados', 'EmpleadosController@index');

//Ruta de formulario
Route::get('empleados/agregar',function(){
	return view('empleadosAgregar');
});

//Ruta para guardar nuevos empleados y recibir data (fase 1)

Route::post('empleados',function(Request $request){
	
	//retornar solo un parametro
	//return $request->input('estado_civil');

	//retornar todos los valores del array del form elaborado en postman
	//return $request->all();

	//Validar data del empleado:
	/*$request->validate([
		'nombres'=>'required|max:50',
		'apellidos'=>'required|max:50',
		'cedula'=>'required|max:20',
		'email'=>'required|max:50|email|unique:empleados',
		'lugar_nacimiento'=>'required|max:50',
		'estado_civil'=>'required|max:50',
		'telefono'=>'required|numeric'
	]);*/

	//Llenar los parametros usando request y guardarlo en la tabla de la base de datos
	$empleado = new Empleado;
	$empleado->nombres = $request->input('nombres');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
	$empleado->sexo = $request->input('sexo');
	$empleado->estado_civil = $request->input('estado_civil');
	$empleado->telefono = $request->input('telefono');

	$empleado->save();
	header('location: api/empleados');
	return "Usuario creado";
});

//Ruta para actualizar empleado
Route::put('empleados/{id}',function(Request $request, $id){
	$request->validate([
		'nombres'=>'required|max:50',
		'apellidos'=>'required|max:50',
		'cedula'=>'required|max:20',
		'email'=>'required|max:50|email|unique:empleados,email, '. $id,
		'lugar_nacimiento'=>'required|max:50',
		'estado_civil'=>'required|max:50',
		'telefono'=>'required|numeric'
	]);
	$empleado = Empleado::findOrFail($id);
	$empleado->nombres = $request->input('nombres');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
	$empleado->sexo = $request->input('sexo');
	$empleado->estado_civil = $request->input('estado_civil');
	$empleado->telefono = $request->input('telefono');
	$empleado->save();
	return "Empleado actualizado";
});


//Ruta para eliminar empleado
Route::delete('empleados/{id}',function($id){
	$empleado = Empleado::findOrFail($id);
	$empleado -> delete();
	return "Empleado eliminado";
});