<?php
	include "conexion.php";

	class Datos extends Conexion {

		public function ingresoUsuarioModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT CONCAT(firstname,' ',lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena', user_id AS 'id' FROM $tabla WHERE user_name = :usuario");
			
			$stmt->bindParam(":usuario",$datosModel["user"],PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		}

		public function vistaUserModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT user_ud AS 'id',firstname,lastname,user_name, user_password,user_email,date_added FROM $tabla");
			
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

		public function inserarUserModel(){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (firstname,lastname,user_name,user_password,user_email) VALUES (:nusuario,:ausuario,:usuario,:contra,:email)");
			
			$stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		public function editarUserModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla");
			
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute()
			return $stmt->fetch();
			$stmt->close();
		}

		public function actualizarUserModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET firstname = :nusuario, lastname = :ausuario, user_name = :usuario, user_password = :contra, user_email = :email WHERE user_id = :id");
			
			$stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		public function eliminarUserModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id = :id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		// MODELO PARA EL TABLERO //
        /*-- Este modelo permite conocer el numero de filas en determinada tabla, se utiliza para mostrar información en el tablero --*/
        public function contarFilasModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS 'filas' FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

		
	}

?>