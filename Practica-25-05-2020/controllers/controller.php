<?php
//include_once "models/crud.php";
//include_once "models/crudProd.php";

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

		public function vistaUserController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de Usuario</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=usuarios">
							<div class="form-group">
								<label>Nombre: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Apellido: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Contraseña: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Correo Electronico: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		// REGISTRO DE USUARIOS
		public function registrarUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){

                //RECIBE A TRAVES DEL METODO POST EL NAME (HTML) DE USUARIO, PASSWORD Y EMAIL, SE ALMACENAN LOS DATOS EN UNA VARIABLE O PROPIEDAD DE TIPO ARRAY ASOCIATIVO CON SUS RESPECTIVAS PROPIEDAD(usuario, password, email).
                $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                          "password"=>$_POST["passwordRegistro"],
                                          "email"=>$_POST["emailRegistro"]);

				//Se mandan los datos al modelo 
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		// REGISTRO DE PRODUCTOS
		public function registrarProductoController(){
			if(isset($_POST["productoRegistro"])){

                //RECIBE A TRAVES DEL METODO POST EL NAME (HTML) DE nombre, descripcion, pc, pv, inventario SE ALMACENAN LOS DATOS EN UNA VARIABLE O PROPIEDAD DE TIPO ARRAY ASOCIATIVO CON SUS RESPECTIVAS PROPIEDAD(usuario, password, email).
                $datosController = array("nombre"=>$_POST["productoRegistro"],
                                          "descripcion"=>$_POST["descripcionRegistro"],
                                          "pv"=>$_POST["pvRegistro"],
                                          "pc"=>$_POST["pcRegistro"],
                                          "inventario"=>$_POST["inventarioRegistro"]);
                 
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroProductoModel($datosController,"productos");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okproduct");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		// REGISTRO DE CATEGORIAS
		public function registrarCategoriaController(){
			if(isset($_POST["categoriaRegistro"])){

                //RECIBE A TRAVES DEL METODO POST EL NAME (HTML) DE nombre SE ALMACENAN LOS DATOS EN UNA VARIABLE O PROPIEDAD DE TIPO ARRAY ASOCIATIVO CON SUS RESPECTIVAS PROPIEDAD(usuario, password, email).
                $datosController = array("nombre"=>$_POST["categoriaRegistro"]);
                 
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroCategoriaModel($datosController,"categorias");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okcategoria");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		//INGRESO USUARIOS
		public function ingresoUsuarioController(){
			if (isset($_POST["usuarioIngreso"]) && isset($_POST["txtPassword"])){
				$datosController=array("user" => $_POST["txtUser"],
										 "password" => $_POST["txtPasswordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["txtUser"] && $respuesta["password"] == $_POST["txtPassword"]){
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("location:index.php?action=tablero");
				}else{
					header("location: index.php?action=fallo&res=fallo");
				}

			}
		}

		//Controlador para cargar todos los datos de lo usuarios, la contraeña no se puede cargar debido a que independientemente de si se muestra o no, esta está encriptada.
        public function vistaUsersController(){
            $respuesta = Datos::vistaUsersModel("users");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class=fa fa-edit"></i></a>
                        </td>
                        <td>
                        <a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class=fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["firstname"].'</td>
                        <td>'.$item["lastname"].'</td>
                        <td>'.$item["user_name"].'</td>
                        <td>'.$item["user_email"].'</td>
                        <td>'.$item["date_added"].'</td>
                    </tr>
                ';
            }
        }

		//VISTA DE PRODUCTOS
		public function vistaProductosController(){
			$respuesta = Datos2:: vistaProductosModel("productos");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["descripcion"].'</td>
					<td>'.$item["pv"].'</td>
					<td>'.$item["pc"].'</td>
					<td>'.$item["inventario"].'</td>
					<td><a href="index.php?action=editarProducto&id='.$item["id"].
					'"><button class="btn btn-primary">Editar</button></a></td>
					<td><a href="index.php?action=producto&idBorrar='.$item["id"].
					'"><button class="btn btn-danger">Borrar</button></a></td>';
			}
		}

		//VISTA DE CATEGORIAS
		public function vistaCategoriasController(){
			$respuesta = Datos2:: vistaCategoriasModel("categorias");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td><a href="index.php?action=editarCategoria&id='.$item["id"].
					'"><button class="btn btn-primary">Editar</button></a></td>
					<td><a href="index.php?action=categorias&idBorrar='.$item["id"].
					'"><butto class="btn btn-danger"n>Borrar</button></a></td>';
			}
		}

		//EDITAR USUARIO
		public function editarUsuarioController(){
			$datosController = $_GET["id"];
			$respuesta=Datos::editarUsuarioModel($datosController,"usuarios");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["email"].'" name="emailEditar" required>
			<input type="submit" class="btn btn-primary" value="Confirmar">';
		}

		//EDITAR PRODUCTO
		public function editarProductoController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarProductoModel($datosController,"productos");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="productoEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["descripcion"].'" name="descripcionEditar" required>
			<input type="number" class="form-control" value="'.$respuesta["pv"].'" name="pvEditar" required>
			<input type="number" class="form-control" value="'.$respuesta["pc"].'" name="pcEditar" required>
			<input type="number" class="form-control" value="'.$respuesta["inventario"].'" name="inventarioEditar" required>
			<input type="submit" class="btn btn-primary" value="Confirmar">';
		}

		//EDITAR CATEGORIA
		public function editarCategoriaController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarCategoriaModel($datosController,"categorias");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="categoriaEditar" required>
			<input type="submit" class="btn btn-primary" value="Confirmar">';
		}

		//ACTUALIZAR USUARIO
		public function actualizarUsuarioController(){
			if (isset($_POST["usuarioEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$_POST["passwordEditar"],
										"email"=>$_POST["emailEditar"]);
				$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($respuesta == "success"){
					header("location: index.php?action=cambio");
				}else{
					echo "error";
				}
			}
		}

		//ACTUALIZAR Producto
		public function actualizarProductoController(){
			if (isset($_POST["productoEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["productoEditar"],
										"descripcion"=>$_POST["descripcionEditar"],
										"pv"=>$_POST["pvEditar"],
										"pc"=>$_POST["pcEditar"],
										"inventario"=>$_POST["inventarioEditar"]);
				$respuesta=Datos2::actualizarProductoModel($datosController,"productos");

				if($respuesta == "success"){
					header("location: index.php?action=cambioproduct");
				}else{
					echo "error";
				}
			}
		}

		//ACTUALIZAR CATEGORIA
		public function actualizarCategoriaController(){
			if (isset($_POST["categoriaEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["categoriaEditar"]);
				$respuesta=Datos2::actualizarCategoriaModel($datosController,"categorias");

				if($respuesta == "success"){
					header("location: index.php?action=cambiocategoria");
				}else{
					echo "error";
				}
			}
		}

		//Borrar USUARIO
		public function borrarUsuarioController(){

			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if ($respuesta=="success") {
					header("location: index.php?action=usuarios");
				}
			}
		}

		//Borrar PRODUCTO
		public function borrarProductoController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarProductoModel($datosController,"productos");
				if ($respuesta=="success") {
					header("location: index.php?action=producto");
				}
			}
		}

		//Borrar CATEGORIA
		public function borrarCategoriaController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarCategoriaModel($datosController,"categorias");
				if ($respuesta=="success") {
					header("location: index.php?action=categorias");
				}
			}
		}

	}

		//LISTA DE METODOS DE MODELOS A DESARROLLAR
		/*
		1. registroUsuarioModel --ok
		2. ingresarUsuarioModel --ok
		3. vistaUsuarioModel --ok
		4. editarUsuarioModel --ok
		5. actualizarUsuarioModel --ok
		6. borrarUsuarioModel --ok
		3. actualizarUsuarioModel --ok
		*/
?>