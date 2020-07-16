<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UbicacionController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla ubicacion
    public function index(){
    	return DB::table('ubicacion')->get();
    }
}
