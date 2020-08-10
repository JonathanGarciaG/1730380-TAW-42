<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\pedidos;
use App\productos;
use App\historial;

class PedidosController extends Controller
{
    //funcion que retorna los valores de los pedidos realizados por el usuario actual
    public function index(){
    	return DB::table('pedidos')->join('productos','productos.id','=','pedidos.id_producto')->join('users','users.id','=','pedidos.id_usuario')->join('empresas','empresas.id_usuario','=','users.id')->join('imagenes_productos','imagenes_productos.id_producto','=','productos.id')->select('pedidos.*','pedidos.id as id_pedido','empresas.nombre as nombre_empresa','productos.*','imagenes_productos.imagen')->where('pedidos.id_usuario', '=', Auth::user()->id )->get();
    }

    //metodo del controlador para agregar un pedido mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $pedido = new pedidos();
        $pedido->cantidad = $request->cantidad;
        $monto = $request->precio * $request->cantidad;
        $pedido->monto = $monto;
        $pedido->id_usuario = Auth::user()->id;
        $pedido->id_producto = $request->id_producto;
        //se guardan los valores
        $pedido->save();

        //se actualiza el stock del producto
    	$producto = productos::findOrFail($request->id_producto);
    	$producto->stock = $producto->stock - $request->cantidad;
    	$producto->save();

        //se retorna el pedido guardado
        return $pedido;
    }

    //metodo para eliminar pedidos de la tabla pedidos
    public function destroy($id)
    {
    	//se busca el pedido que se quiere eliminar
        $pedido = pedidos::find($id);
        $pedido->delete();
    }

}
