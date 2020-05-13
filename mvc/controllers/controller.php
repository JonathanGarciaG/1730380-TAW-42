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

?>