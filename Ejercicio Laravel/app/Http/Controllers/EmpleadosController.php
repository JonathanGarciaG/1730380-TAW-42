<?php

namespace App\Http\Controllers;

use App\Empleados;
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
        //Obtener todos los empleados de la tabla de la bd
        $empleados = Empleados::all();
        //Mostrar vista de la consulta empleados
        return view('empleados.admin_empleados',compact('empleados'));
    }

    //Controlador para crear nuevo empleado
    public function create(){
        //mostrar el formulario para crear empleado
        return view('empleados.alta_empleado',compact('empleados'));
    }

    //Controlador para almacenar empleados
    public function store(Request $request)
    {
        //Retirar los datos del Request
        $datosEmpleado=request()->except('empleados');

        //Insertar en la tabla empleado los datos para la creacion de un nuevo registro
        $id=DB:table('empleados')->insertGetId($datosEmpleado);
        Alert:success('Datos guardado con exito');
        return redirect('empleados');
    }

    //Controlador para editar Empleados
    public function edit(){
        //Editar eempleados y mandar a la vista la informacion
        $empleado=Empleados::findOrFail($id);

        //Mstrar la vista
        return view('empleados.editar_empleados',compact('empleado'));
    }

    public function destroy($id){
        Alert:success('Eliminado con exito');
        return redirect ('empleados');
    }
}
