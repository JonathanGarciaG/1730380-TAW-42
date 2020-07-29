<?php

namespace App\Http\Controllers;

use App\ubicacion;
use Illuminate\Http\Request;
use DB;

class UbicacionController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla ubicacion
    public function index(){
    	return DB::table('ubicacion')->get();
    }

    //metodo del controlador para agregar una ubicacion de empresa mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $ubicacion = new ubicacion();
        $ubicacion->municipio = $request->municipio;
        $ubicacion->estado = $request->estado;
        $ubicacion->direccion = $request->direccion;
        //se guardan los valores
        $ubicacion->save();
        //se retorna la ubicacion de la empresa guardado
        return $ubicacion;
    }

    //Metodo para actualizar ubicacion de empresa
    public function update(Request $request){
        $ubicacion = ubicacion::findOrFail($request->input('id'));
        //Guardando los nuevos valores de la ubicacion
        $ubicacion->municipio = $request->input('municipio');
        $ubicacion->estado = $request->input('estado');
        $ubicacion->direccion = $request->input('direccion');
    
        $ubicacion->save();
    }

    //Metodo para obtener los datos de un ubicacion de empresa.
    public function show($id){
        $ubicacion = ubicacion::find($id);
        return $ubicacion;
    }

    //metodo para eliminar registro de la tabla ubicacion de empresas
    public function destroy($id)
    {
    	//se busca el ubicacion de empresa que se quiere eliminar
        $ubicacion = ubicacion::find($id);
        $ubicacion->delete();
    }
}
