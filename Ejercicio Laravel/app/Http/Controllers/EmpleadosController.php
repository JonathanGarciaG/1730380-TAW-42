<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Departamentos;
use Illuminate\Http\Request;
use DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['empleados'] = Empleados::get();
        //return view('empleados', $datos);
        //Obtener todos los empleados de la tabla de la BD y ejecutando un join con la tabla departamentos para obtener el nombre de este.
        $empleados = DB::table('empleados')->join('departamentos', 'empleados.departamento','=','departamentos.id')->select('empleados.*', 'departamentos.nombre')->get();
        //Mostrar vista de la consulta empleados
        return view('empleados.admin_empleados',compact('empleados'));
    }

    //Controlador para crear nuevo empleado
    public function create(){
        //obtener los departamentos
        $departamentos = departamentos::all();
        //mostrar el formulario para crear empleado
        return view('empleados.alta_empleado',compact('departamentos'));
    }

    //Controlador para almacenar empleados
    public function store(Request $request)
    {
        //Retirar los datos del Request
        $datosEmpleado=request()->except('empleados');

        //Insertar en la tabla empleado los datos para la creacion de un nuevo registro
        $id=DB::table('empleados')->insertGetId($datosEmpleado);
        //Alert::success('Datos guardado con exito');
        return redirect('empleados');
    }

    //Controlador para editar Empleados
    public function edit($id){
        //Editar eempleados y mandar a la vista la informacion
        $empleado=Empleados::findOrFail($id);
        //Se obtienen los departamentos para mostrarlos en el select de la vista
        $departamentos = departamentos::all();

        //Mostrar la vista
        return view('empleados.editar_empleados',compact('empleado','departamentos'));
    }

    //Contrlador update para actualizar el registro del empleado seleccionado
    public function update(Request $request, $id){
        $empleado = Empleados::findOrFail($id);
        
        //Nuevos valores del empleado editado 
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');    
        $empleado->cedula = $request->input('cedula');
        $empleado->departamento = $request->input('departamento');
        $empleado->email = $request->input('email');
        $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
        $empleado->sexo = $request->input('sexo');
        $empleado->estado_civil = $request->input('estado_civil');
        $empleado->telefono = $request->input('telefono');
        $empleado->save();

        //redirecciona a el indice de empleados
        return redirect('empleados');
    }

    public function destroy($id){
        $empleado = Empleados::findOrFail($id);
        $empleado -> delete();
        //Alert::success('Eliminado con exito');
        return redirect ('empleados');
    }
}
