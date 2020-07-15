<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla usuarios
    public function getUsuarios(){
    	//return productos::where('user_id', auth()->id())->get();
    	return DB::table('users')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tipo = $request->tipo;
        //se guardan los valores
        $user->save();
        //se retorna el usuario guardado
        return $user;
    }
}
