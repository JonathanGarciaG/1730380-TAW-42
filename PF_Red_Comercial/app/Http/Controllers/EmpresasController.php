<?php

namespace App\Http\Controllers;

use App\User;
use App\empresas;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EmpresasController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla empresas
    public function index(){
    	return DB::table('empresas')->join('categoria_empresa', 'empresas.id_categoria', '=', 'categoria_empresa.id')->join('users', 'users.id', '=', 'empresas.id_usuario')->select('empresas.*', 'users.name', 'users.lastname', 'categoria_empresa.nombre as nombre_categoria_empresa')->get();
    }

    //metodo del controlador para agregar un empresa mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $empresa = new empresas();
        $empresa->nombre = $request->nombre;
        $empresa->telefono = $request->telefono;
        $empresa->descripcion = $request->descripcion;
        $empresa->id_usuario = $request->id_usuario;
        $empresa->id_ubicacion = $request->id_ubicacion;
        $empresa->id_categoria = $request->id_categoria;
        //se guardan los valores
        $empresa->save();
        //se retorna el empresa guardado
        return $empresa;
    }

    //Metodo para actualizar empresa
    public function update(Request $request){
        $empresa = empresas::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $empresa->nombre = $request->input('nombre');
        $empresa->telefono = $request->input('telefono');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->id_usuario = $request->input('id_usuario');
        $empresa->id_ubicacion = $request->input('id_ubicacion');
        $empresa->id_categoria = $request->input('id_categoria');
    
        $empresa->save();
    }

    //Metodo para obtener los datos de un empresa.
    public function getempresa($id){
        $empresa = empresas::find($id);
        return $empresa;
    }

    //Metodo para obtener los datos de la empresa del usuario actual.
    public function empresaact(){
        return DB::table('empresas')->where('id_usuario','=', Auth::user()->id )->get();
    }

    //metodo para eliminar registro de la tabla empresas
    public function destroy($id)
    {
    	//se busca el empresa que se quiere eliminar
        $empresa = empresas::find($id);
        $empresa->delete();
    }
}
