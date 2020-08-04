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
    	return DB::table('productos')->join('empresas', 'productos.id_empresa', '=', 'empresas.id')->join('categorias_productos', 'productos.id_categoria', '=', 'categorias_productos.id')->join('imagenes_productos', 'productos.id', '=', 'imagenes_productos.id_producto')->select('productos.*', 'empresas.nombre as nombre_empresa','empresas.id_usuario as id_de_usuario', 'categorias_productos.nombre_categoria','imagenes_productos.imagen')->where('id_usuario', '=', Auth::user()->id )->get();
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
        $producto->descripcion = $request->descripcion;
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
        $producto->descripcion = $request->input('descripcion');
        $producto->stock = $request->input('stock');
        $producto->longitud = $request->input('longitud');
        $producto->anchura = $request->input('anchura');
        $producto->altura = $request->input('altura');
        $producto->id_empresa = $request->input('id_empresa');
        $producto->id_categoria = $request->input('id_categoria');
    
        $producto->save();
    }

    //funcion que retorna los valores de productos buscados
    public function buscar($busqueda){
        return DB::table('productos')->join('empresas', 'productos.id_empresa', '=', 'empresas.id')->join('categorias_productos', 'productos.id_categoria', '=', 'categorias_productos.id')->join('imagenes_productos', 'productos.id', '=', 'imagenes_productos.id_producto')->select('productos.*', 'empresas.nombre as nombre_empresa','empresas.id_usuario as id_de_usuario', 'empresas.latitud', 'empresas.longitud', 'categorias_productos.nombre_categoria','imagenes_productos.imagen')->where('productos.nombre', 'LIKE', '%'.$busqueda.'%' )->orWhere('nombre_categoria', 'LIKE', '%'.$busqueda.'%' )->get();
    }

    //Metodo para obtener los datos de un producto.
    public function getproducto($id){
        $producto = productos::find($id);
        return $producto;
    }

    //funcion que retorna los valores de los registros de la tabla productos de una empresa
    public function getproductos($id){
        return DB::table('productos')->join('empresas', 'productos.id_empresa', '=', 'empresas.id')->join('categorias_productos', 'productos.id_categoria', '=', 'categorias_productos.id')->join('imagenes_productos', 'productos.id', '=', 'imagenes_productos.id_producto')->select('productos.*', 'empresas.nombre as nombre_empresa','empresas.id_usuario as id_de_usuario', 'categorias_productos.nombre_categoria','imagenes_productos.imagen')->where('empresas.id', '=', $id )->get();
    }

    //Metodo para obtener los datos de todos los productos.
    public function getallproductos(){
        return DB::table('productos')->join('empresas', 'productos.id_empresa', '=', 'empresas.id')->join('categorias_productos', 'productos.id_categoria', '=', 'categorias_productos.id')->join('imagenes_productos', 'productos.id', '=', 'imagenes_productos.id_producto')->select('productos.*', 'empresas.nombre as nombre_empresa','empresas.id_usuario as id_de_usuario', 'empresas.latitud', 'empresas.longitud', 'categorias_productos.nombre_categoria','imagenes_productos.imagen')->get();
    }

    //metodo para eliminar registro de la tabla productos
    public function destroy($id)
    {
    	//se busca el producto que se quiere eliminar
        $producto = productos::find($id);
        $producto->delete();
    }
}
