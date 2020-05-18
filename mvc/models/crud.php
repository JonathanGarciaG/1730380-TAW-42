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

	//Modelo ingresoIsiaroModel
	public function ingresoUsuarioModel($daotsModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
		$stmt = bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
		$stmt = execute();
		//fetch() obtiene una fila de un conjunto de resultados asociados al objeto stmt
		return $stmt->fetch();

		$stmt->$close();
	}

	//MODELO VISTA USUARIOS
	public function vistaUsuariosModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
		$stmt->execute();

		//fetchAll(); Oobtiene todas las filas de un conjunto de resultados asociado al objeto PDO statement
		return $stmt->fetchAll();

		$stmt->close();
	}

	//MODELO VISTA USUARIOS
	public function editarUsuarioModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id,usuario,password,email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	//MODELO ACTUALIZAR USUARIO
	public function actualizarUsuarioModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET usuraio = :usuario, password = :password, email = :email WHERE id = :id ");
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}

	//MODELO  BORRAR USUARIO
	public function borrarUsuarioModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}
}

?>