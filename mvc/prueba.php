<?php
include_once "models/conexion.php";
include_once "models/crud.php";
include_once "controllers/controller.php";

$datosController = array("usuario"=>"taw",
										"password"=>"taw",
										"email"=>"taw");

$respuesta =  Datos::registroUsuarioModel($datosController, "usuarios");

echo $respuesta;

/*$bd = new Conexion();
$bd -> conectar();*/

?>