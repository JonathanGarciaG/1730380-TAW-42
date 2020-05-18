<?php
	require_once "conexion.php";
//heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una funcion o metodo, en este caso manipularemos la funcion "conectar" de models/conexion.php

//Clase para los cruds de producto y categoria
class Datos2 extends Conexion {

	//REGISTRO DE PRODUCTO
	public function registroProductoModel($datosModel, $tabla){
		//prepare() prepara las sentencias de sql para que sea ejecutada por el metodo POSTStatement la secuencia de sql se puede ejecutar desde 0 para ejecutar mas parametros

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, pv, pc, inventario) VALUES (:nombre, :descripcion, :pv, :pc, :inventario)");

		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":pv", $datosModel["pv"], PDO::PARAM_INT);
		$stmt->bindParam(":pc", $datosModel["pc"], PDO::PARAM_INT);
		$stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);

		//regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}

		$stmt->close();
	}

	//REGISTRO DE CATEGORIA
	public function registroCategoriaModel($datosModel, $tabla){
		//prepare() prepara las sentencias de sql para que sea ejecutada por el metodo POSTStatement la secuencia de sql se puede ejecutar desde 0 para ejecutar mas parametros

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		//regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}

		$stmt->close();
	}

	//MODELO VISTA PRODUCTOS
	public function vistaProductosModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id, nombre, descripcion, pv, pc, inventario FROM $tabla");
		$stmt->execute();

		//fetchAll(); Oobtiene todas las filas de un conjunto de resultados asociado al objeto PDO statement
		return $stmt->fetchAll();

		$stmt->close();
	}

	//MODELO VISTA CATEGORIAS
	public function vistaCategoriasModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
		$stmt->execute();

		//fetchAll(); Oobtiene todas las filas de un conjunto de resultados asociado al objeto PDO statement
		return $stmt->fetchAll();

		$stmt->close();
	}

	//MODELO EDITAR PRODUCTOS
	public function editarProductoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, descripcion, pv, pc, inventario FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	//MODELO EDITAR CATEGORIAS
	public function editarCategoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	//MODELO ACTUALIZAR PRODUCTO
	public function actualizarProductoModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, pv = :pv, pc = :pc, inventario = :inventario WHERE id = :id ");
		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":pv", $datosModel["pv"], PDO::PARAM_INT);
		$stmt->bindParam(":pc", $datosModel["pc"], PDO::PARAM_INT);
		$stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}

	//MODELO ACTUALIZAR PRODUCTO
	public function actualizarCategoriaModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id ");
		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}

	//MODELO  BORRAR PRODUCTO
	public function borrarProductoModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	//MODELO BORRAR CATEGORIA
	public function borrarCategoriaModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre o de signo conrrespondiente a la sentencia sql que fue usada para preparar la sentencia
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