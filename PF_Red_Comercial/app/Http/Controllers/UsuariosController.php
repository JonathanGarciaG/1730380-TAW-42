<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use DB;

class UsuariosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla usuarios
    public function getUsuarios(){
    	//return productos::where('user_id', auth()->id())->get();
    	return DB::table('usuarios')->get();
    }
}
