<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
use DB;

class ProductosController extends Controller
{

	//funcion que retorna los valores de los registros de la tabla productos
    public function index(){
    	//return productos::where('user_id', auth()->id())->get();
    	return DB::table('productos')->get();
    }

    //metodo del controlador para agregar producto mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $producto = new productos();
        $producto->codigo_producto = $request->codigo_producto;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_producto = $request->precio_producto;
        $producto->stock = $request->stock;
        $producto->categoria = $request->categoria;
        //se guardan los valores
        $producto->save();
        //se retorna el producto guardado
        return $producto;
    }
}
