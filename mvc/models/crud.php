<?php
require_once "conexion.php";
//heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una funcion o metodo, en este caso manipularemos la funcion "conectar" de models/conexion.php

class Datos extends Conexion {

	//REGISTRO DE USUARIOS
	public function registroUsuarioModel ($datosModel, $tabla){
		//prepare() prepara las sentencias de sql para que sea ejecutada por el metodo POSTStatement la secuencia de sql se puede ejecutar desde 0 para ejecutar mas parametros

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario, :password, :email)");

		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		//regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}

		$stmt->close();
	}
}



?>