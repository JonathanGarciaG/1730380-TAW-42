<?php
	class MvcController{
		#llamar a la plantilla
		public function pagina(){
			include "views/template.php";
		}

		// ENLACES A LAS PAGINAS
		public function enlacesPaginasController(){
			if (isset($_GET['action'])) {
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para que muestre el listado de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		// REGISTRO DE USUARIOS
		public function registrarUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){
				//Recibe a traves del metodo POST el name HTML de usuario se almacenan los datos en una variable o propiedad de tipo array asociativo en el cual con sus respectivas propiedades (usuario, password y email)
				$datosController = array("usuario"=>$_POST["usuarioRegistro"],
										"password"=>$_POST["passwordRegistro"],
										"email"=>$_POST["emailRegistro"]);
				//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en modelo Datos el metodo registroUsuariosModel reciba en sus parametros los valores $datosCOntroller y el nombre de la tabla a la cual debe conectarse (usuarios)
				$respuesta =  Datos::registroUsuariosModel($datosController, "usuarios");

				//se imprime la respuesta en la vista
				if($respuesta == "success"){
					header("location:index.php?action=ok");
				}else{
					header("location:index.php");
				}
			}
		}
		//INGRESO USUARIOS
		public function ingresoUsuarioController(){
			if (isset($_POST["usuarioIngreso"])){
				$datosController=array ("usuario" => $_POST["usuarioIngreso",
										 "password" => $_POST["passwordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
					session_start();
					$_SESSION["validar"] = true;
					header["Location: index.php?action=usuarios"];
				}else{
					header("Location: index.php?action=fallo");
				}

			}
		}

		//VISTA DE USUARIOS
		public function vistaUsuariosController(){
			$respuesta = Datos:: vistaUsuariosModel("usuarios");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["usuario"].'</td>
					<td>'.$item["password"].'</td>
					<td>'.$item["email"].'</td>
					<td><a href="index.php?action=editar&id='.$item["id"].
					'"><button>Editar</button></a></td>
					<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].
					'"><button>Borrar</button></a></td>';
			}
		}

		//EDITAR USUARIO
		public function editarUsuraioController(){
			$datosController = $_GET["id"];
			$respuesta=Datos::editarUsuarioModel($datosController,"usuarios");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>';
		}

		//ACTUALIZAR USUARIO
		public function actualizarUsuarioController(){
			if (isset($_POST["usuarioEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$_POST["usuarioPassword"],
										"email"=>$POST["emailEditar"]);
				$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($respuesta == "success"){
					header("location: index.php?action=cambio");
				}else{
					echo "error";
				}
			}
		}


		//Borrar USUARIO
		public function borrarUsuarioController(){
			if(isset($_GET("idBorrar"))){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if ($respuesta=="success") {
					header("location: index.php?action=usuarios");
				}
			}
		}

		//LISTA DE METODOS DE MODELOS A DESARROLLAR
		/*
		1. registroUsuarioModel
		2. ingresarUsuarioModel
		3. vistaUsuarioModel
		4. editarUsuarioModel
		5. actualizarUsuarioModel
		6. borrarUsuarioModel
		3. actualizarUsuarioModel
		*/
	}


?>