<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriasEmpresasController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla categoria_empresa
    public function index(){
    	return DB::table('categoria_empresa')->get();
    }
}
