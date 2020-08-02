<?php

namespace App\Http\Controllers;

use App\imagenes_micrositio;
use Illuminate\Http\Request;
use DB;

class ImagenesSitioController extends Controller
{
	//retorna todos los registros de imagenes_micrositios
	public function index(){
		return DB::table('imagenes_sitio')->get();
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
		$imagenp->id_micrositio = $request->input('descripcion');
        //Registrando imagen.
        $imagenp->save();
    }
}
