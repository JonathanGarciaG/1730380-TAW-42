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
								<input class="form-control" type="text" name="ausuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Usuario: </label>
								<input class="form-control" type="text" name="usuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Contraseña: </label>
								<input class="form-control" type="text" name="ucontratxt" placeholder="Ingrese nombre" required>
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

		public function insertarUserController(){
			if (isset($_POST["nusuariotxt"])) {
				
				$_POST["ncontratxt"] = password_hash($_POST["ncontratxt"],PASSWORD_DEFAULT);

				$datosController = array["nusuario" => $_POST["nusuariotxt"],"ausuario" => $_POST["ausuariotxt"],"usuario" => $_POST["usuariotxt"],"contra" => $_POST["ucontratxt"],"email"=>$_POST["uemailtxt"];

				$respuesta = Datos::insertarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario agregado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de agregar un usuario
							</div>
						</div>
					';
				}
			}
		}

		public function editarUserController(){
			$datosController = $_GET["idUserEditar"];
			$respuesta = Datos::editarUserModel($datosController,"users");
			?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                    </div>
            </div>
            <?php
        }

        public function actualizarUserController(){
        	if (isset($_POST["nusuariotxtEditar"])) {
        		$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"],PASSWORD_DEFAULT);

        		$datosController = array["nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"];

				$respuesta = Datos::actualizarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario agregado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de agregar un usuario
							</div>
						</div>
					';
				}
        	}
        }


        public function eliminarUserController(){
        	if (isset($_GET["idBorrar"])) {
        		$datosController = $_GET["idBorrar"];

        		$respuesta = Datos::eliminarUserModel($datosController,"users");

        		if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario eliminado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de eliminar un usuario
							</div>
						</div>
					';
				}
        	}
        }


		//INGRESO USUARIOS
		public function ingresoUserController(){
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

        public function contarFilas(){
        	$respuesta_users = Datos::contarFilasModel("users");

        	echo '
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_users["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
        }
        
?>