<?php

namespace App\Http\Controllers;

use App\categoria_empresa;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CategoriasEmpresasController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla categoria_empresa
    public function index(){
    	return DB::table('categoria_empresa')->get();
    }

    //metodo del controlador para agregar un categoria de empresa mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $categoria = new categoria_empresa();
        $categoria->nombre = $request->nombre;
        //se guardan los valores
        $categoria->save();
        //se retorna el categoria de empresa guardado
        return $categoria;
    }

    //Metodo para actualizar categoria de empresa
    public function update(Request $request){
        $categoria = categoria_empresa::findOrFail($request->input('id'));
        //Guardando los nuevos valores de la categoria
        $categoria->nombre = $request->input('nombre');
    
        $categoria->save();
    }

    //Metodo para obtener los datos de un categoria de empresa.
    public function show($id){
        $categoria = categoria_empresa::find($id);
        return $categoria;
    }

    //metodo para eliminar registro de la tabla categoria de empresas
    public function destroy($id)
    {
    	//se busca el categoria de empresa que se quiere eliminar
        $categoria = categoria_empresa::find($id);
        $categoria->delete();
    }
}
