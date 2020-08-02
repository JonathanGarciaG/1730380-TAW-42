<?php

namespace App\Http\Controllers;

use App\micrositios;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class MicrositiosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla micrositios
    public function index(){
    	return DB::table('micrositios')->join('empresas', 'empresas.id', '=', 'micrositios.id_empresa')->join('imagenes_sitio', 'micrositios.id', '=', 'imagenes_sitio.id_micrositio')->where('id_usuario','=', Auth::user()->id )->get();
    }

    //metodo del controlador para agregar un micrositio a la empresa recien creada mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $empresam = new micrositios();
        $empresam->nombre_sitio = $request->nombre;
        $empresam->id_empresa = $request->id_empresa;
        //se guardan los valores
        $empresam->save();
        //se retorna el micrositio guardado
        return $empresam;
    }

}
