<?php

namespace App\Http\Controllers;

use App\User;
use App\empresas;
use App\productos;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla productos
    public function index(){
    	return DB::table('productos')->join('empresas', 'productos.id_empresa', '=', 'empresas.id')->join('categorias_productos', 'productos.id_categoria', '=', 'categorias_productos.id')->select('productos.*', 'empresas.nombre as nombre_empresa','empresas.id_usuario as id_de_usuario', 'categorias_productos.nombre_categoria')->where('id_usuario', '=', Auth::user()->id )->get();
    }

    //metodo del controlador para agregar un producto mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $producto = new productos();
        $producto->nombre = $request->nombre;
        $producto->tipo = $request->tipo;
        $producto->codigo = $request->codigo;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->longitud = $request->longitud;
        $producto->anchura = $request->anchura;
        $producto->altura = $request->altura;
        $producto->id_empresa = $request->id_empresa;
        $producto->id_categoria = $request->id_categoria;
        //se guardan los valores
        $producto->save();
        //se retorna el producto guardado
        return $producto;
    }

    //Metodo para actualizar producto
    public function update(Request $request){
        $producto = productos::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $producto->nombre = $request->input('nombre');
        $producto->tipo = $request->input('tipo');
        $producto->codigo = $request->input('codigo');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->longitud = $request->input('longitud');
        $producto->anchura = $request->input('anchura');
        $producto->altura = $request->input('altura');
        $producto->id_empresa = $request->input('id_empresa');
        $producto->id_categoria = $request->input('id_categoria');
    
        $producto->save();
    }

    //Metodo para obtener los datos de un producto.
    public function getproducto($id){
        $producto = productos::find($id);
        return $producto;
    }

    //metodo para eliminar registro de la tabla productos
    public function destroy($id)
    {
    	//se busca el producto que se quiere eliminar
        $producto = productos::find($id);
        $producto->delete();
    }
}
