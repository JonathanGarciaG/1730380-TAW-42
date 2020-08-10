<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\pedidos;
use App\productos;
use App\historial;

class HistorialController extends Controller
{
    //funcion que retorna los valores del historial de los movimientos realizados por el usuario actual
    public function index(){
    	return DB::table('historial_pagos')->where('historial_pagos.id_usuario', '=', Auth::user()->id )->get();
    }

    //metodo del controlador para agregar un registro de historial mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $historial = new historial();
        $historial->monto = $request->monto;
        $historial->metodo_pago = $request->metodo_pago;
        $historial->motivo_pago = $request->motivo_pago;
        $historial->referencia = rand();
        $historial->id_usuario = Auth::user()->id;
        //se guardan los valores
        $historial->save();

        DB::table('pedidos')->where('id_usuario','=', Auth::user()->id )->delete();

        //se retorna el historial guardado
        return $historial;
    }

}
