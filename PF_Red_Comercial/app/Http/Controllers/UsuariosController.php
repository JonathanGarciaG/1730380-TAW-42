<?php

namespace App\Http\Controllers;

use App\User;
use App\empresas;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla usuarios
    public function index(){
    	//return productos::where('user_id', auth()->id())->get();
    	return DB::table('users')->where('tipo', '!=', 'Super User')->get();
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

    //Metodo para actualizar usuario
    public function update(Request $request){
        $user = User::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo = $request->input('tipo');
    
        $user->save();
    }

    //Metodo para obtener los datos de un usuario.
    public function getuser($id){
        $user = User::find($id);
        return $user;
    }

    //Metodo para obtener los datos de un usuario aun no asociados.
    public function getadminusers(){
        //return DB::table('users')->where('tipo', '=', 'Administrador')->get();
        return DB::table('users')->whereNotIn('id', DB::table('empresas')->select('id_usuario'))->where('tipo','=','Administrador')->get();
        /*$jobs = RepairJob::with('repairJobPhoto', 'city', 'vehicle')
    ->where('active', 'Y')->doesntHave('dismissedRequests')->get();*/
    }

    //metodo para eliminar registro de la tabla users
    public function destroy($id)
    {
    	//se busca el usuario que se quiere eliminar
        $user = User::find($id);
        $user->delete();
    }
}
