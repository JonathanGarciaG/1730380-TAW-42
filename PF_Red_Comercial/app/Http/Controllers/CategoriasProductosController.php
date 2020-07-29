<?php

namespace App\Http\Controllers;

use App\categoria_productos;
use Illuminate\Http\Request;
use DB;

class CategoriasProductosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla categoria_productos
    public function index(){
    	return DB::table('categorias_productos')->get();
    }

    //metodo del controlador para agregar un categoria de producto mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $categoria = new categoria_productos();
        $categoria->nombre_categoria = $request->nombre;
        //se guardan los valores
        $categoria->save();
        //se retorna el categoria de producto guardado
        return $categoria;
    }

    //Metodo para actualizar categoria de producto
    public function update(Request $request){
        $categoria = categoria_productos::findOrFail($request->input('id'));
        //Guardando los nuevos valores de la categoria
        $categoria->nombre_categoria = $request->input('nombre');
    
        $categoria->save();
    }

    //Metodo para obtener los datos de un categoria de producto.
    public function show($id){
        $categoria = categoria_productos::find($id);
        return $categoria;
    }

    //metodo para eliminar registro de la tabla categoria de productos
    public function destroy($id)
    {
    	//se busca el categoria de producto que se quiere eliminar
        $categoria = categoria_productos::find($id);
        $categoria->delete();
    }
}
