<?php

namespace App\Http\Controllers;

use App\imagenes_productos;
use Illuminate\Http\Request;
use DB;

class ImagenesProductosController extends Controller
{
    //Metodo para registrar nueva imagen.
    public function store(Request $request){

        //Creando objeto para registrar nueva imagen
        $imagenp = new imagenes_productos;
        //Verificando si se tiene una imagen
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $tituloimagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/products/', $tituloimagen);
            $imagenp->imagen = "/images/products/".$tituloimagen;
        }
        else{//si no tiene se asigna una imagen por defecto
            $imagenp->imagen = '/images/products/default_image.png';
        }
		$imagenp->id_producto = $request->input('id_producto');
        //Registrando imagen.
        $imagenp->save();
    }
}
