<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;
use DB;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['departamentos'] = departamentos::get();
        //return view('departamentos', $datos);
        //Obtener todos los departamentos de la tabla de la bd
        $departamentos = Departamentos::all();
        //Mostrar vista de la consulta departamentos
        return view('departamentos.admin_departamentos',compact('departamentos'));
    }

    //Controlador para crear nuevo departamento
    public function create(){
        //mostrar el formulario para crear departamento
        return view('departamentos.alta_departamento',compact('departamentos'));
    }

    //Controlador para almacenar departamentos
    public function store(Request $request)
    {
        //Retirar los datos del Request
        $datosdepartamento=request()->except('departamentos');

        //Insertar en la tabla departamento los datos para la creacion de un nuevo registro
        $id=DB::table('departamentos')->insertGetId($datosdepartamento);
        //Alert::success('Datos guardado con exito');
        return redirect('departamentos');
    }

    //Controlador para editar departamentos
    public function edit($id){
        //Editar edepartamentos y mandar a la vista la informacion
        $departamento=departamentos::findOrFail($id);

        //Mostrar la vista
        return view('departamentos.editar_departamentos',compact('departamento'));
    }

    //Contrlador update para actualizar el registro del departamento seleccionado
    public function update(Request $request, $id){
        $departamento = departamentos::findOrFail($id);
        
        //Nuevos valores del departamento editado 
        $departamento->nombre = $request->input('nombre');
        
        $departamento->save();

        return redirect('departamentos');
    }

    public function destroy($id){
        $departamento = departamentos::findOrFail($id);
        $departamento -> delete();
        //Alert::success('Eliminado con exito');
        return redirect ('departamentos');
    }
}
