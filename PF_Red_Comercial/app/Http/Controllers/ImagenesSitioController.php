<?php

namespace App\Http\Controllers;

use App\imagenes_micrositio;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ImagenesSitioController extends Controller
{
	//retorna todos los registros de imagenes_micrositios
	public function index(){
		return DB::table('imagenes_sitio')->get();
	}

	//metodo que retorna el micrositio del usuario
	public function mysite(){
		return DB::table('micrositios')->join('empresas','empresas.id','=','micrositios.id_empresa')->select('micrositios.id','empresas.id_usuario')->where('empresas.id_usuario','=', Auth::user()->id )->get();
	}

    //Metodo para registrar nueva imagen.
    public function store(Request $request){
        //Creando objeto para registrar nueva imagen
        $imagenp = new imagenes_micrositio;
        //Verificando si se tiene una imagen
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $tituloimagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/carousel/', $tituloimagen);
            $imagenp->imagen = "/images/carousel/".$tituloimagen;
        }
        else{//si no tiene se asigna una imagen por defecto
            $imagenp->imagen = '/images/products/default_image.png';
        }
		$imagenp->descripcion = $request->input('descripcion');
		$imagenp->id_micrositio = $request->input('id_micrositio');
        //Registrando imagen.
        $imagenp->save();
    }

    //Metodo para actualizar imagen
    public function update(Request $request){
        $imagenp = imagenes_micrositio::findOrFail($request->input('id'));
        //Guardando los nuevos valores de la imagen
        $imagenp->descripcion = $request->input('descripcion');
    
        $imagenp->save();
    }

    //Metodo para obtener los datos de una imagen.
    public function show($id){
        $imagenp = imagenes_micrositio::find($id);
        return $imagenp;
    }

    //metodo para eliminar registro de la tabla imagenes_sitio
    public function destroy($id)
    {
    	//se busca la imagen que se quiere eliminar
        $imagenp = imagenes_micrositio::find($id);
        $imagenp->delete();
    }
}
