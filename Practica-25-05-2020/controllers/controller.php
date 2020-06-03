<?php
include_once "models/crud.php";
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
				$enlaces = 'tablero';
			}
			//Es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para que muestre el listado de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		public function registrarUserController(){
			?>
			<div class="card">
			    <div class="card-body register-card-body">
			      <p class="login-box-msg">Registrar nuevo Usuario</p>

			      <form action="index.php?action=usuarios" method="post">
			        <div class="input-group mb-3">
			          <input type="text" class="form-control" name="nusuariotxt" placeholder="Nombre">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			          <input type="text" class="form-control" name="ausuariotxt" placeholder="Apellido">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			          <input type="text" class="form-control" name="usuariotxt" placeholder="Nombre de usuario">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			          <input type="email" class="form-control" name="uemailtxt" placeholder="Email">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-envelope"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			          <input type="password" class="form-control" name="ucontratxt" placeholder="Contraseña">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-lock"></span>
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <!-- /.col -->
			          <div class="col-12">
			            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
			          </div>
			          <!-- /.col -->
			        </div>
			      </form>
			    </div>
			    <!-- /.form-box -->
			  </div><!-- /.card -->
			<?php
		}

		public function registrarProductController(){
			?>
			<div class="card card-primary">
			<div class="card-header">
				<h4><b>Registro</b> de Productos</h4>
			</div>
			    <div class="card-body">
			      <p class="login-box-msg">Registro de Productos</p>

			      <form action="index.php?action=inventario" method="post">
			        <div class="form-group">
			        	<label>Codigo: </label>
			          	<input type="text" class="form-control" name="codigotxt" placeholder="Codigo">
			        </div>
			        <div class="input-group mb-3">
			        <label>Nombre: </label>
			          <input type="text" class="form-control" name="nombretxt" placeholder="Nombre">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			        <label>Precio: </label>
			          <input type="number" class="form-control" name="preciotxt" placeholder="Precio">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			        <label>Stock: </label>
			          <input type="number" class="form-control" name="stocktxt" placeholder="Stock">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-envelope"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			        <label>Motivo: </label>
			          <input type="number" class="form-control" name="referenciatxt" placeholder="Motivo">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-envelope"></span>
			            </div>
			          </div>
			        </div>
			        <div class="input-group mb-3">
			        <label>Stock: </label>
			          <input type="number" class="form-control" name="uemailtxt" placeholder="Stock">
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-envelope"></span>
			            </div>
			          </div>
			        </div>
			        <div class="form-group">
			        	<label>Categoria: </label>
			        	<select name="categoria" class="form-control">
			        		<?php
			        			$respuesta_categoria = Datos::obtenerCategoryModel("categories");
			        			foreach($respuesta_categoria as $row => $item) {
			        		?>
			        			<option value="<?php echo %item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
			        		<?php
			        			}
			        		?>
			        	</select>

			        </div>
			        <div class="row">
			          <!-- /.col -->
			          <div class="col-12">
			            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
			          </div>
			          <!-- /.col -->
			        </div>
			      </form>
			    </div>
			    <!-- /.form-box -->
			  </div><!-- /.card -->
			<?php
		}

		/*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion 
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/
		public function insertarProductController(){
			if (isset($_POST["codigotxt"])) {
				$datosController = array("codigo"=>$_POST["nusuariotxt"],"precio"=>$_POST["ausuariotxt"],"categoria"=>$_POST["usuariotxt"],"nombre"=>$_POST["ucontratxt"],"stock"=>$_POST["uemailtxt"]);
				$respuesta = Datos::insertarProductsModel($datosController,"products");

				if ($respuesta == "success") {
					$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxt"],"producto"=>$respuesta3["id"],"note"=>$_SESSION["nombre_usuario"]." agrego/compra","reference"=>$_POST["referencialtxt"]);
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon">
									Exito
								</h5>
								Producto agregado con exito
							</div>
						</div>
						';
				}else{
					echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de agregar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		public function editarProductController(){
			$datosController = $_GET["idProductEditar"];
			$respuesta = Datos::editarProductsModel($datosController,"products");
			?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Productos</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=inventario">
                            <div class="form-group">
                                <input type="hidden" name="idProductEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Codigo: </label>
                                <input class="form-control" type="text" name="codigotxteditar" id="nusuariotxtEditar" placeholder="Codigo del producto" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nombretxteditar" id="nombretxteditar" placeholder="Nombre de producto" value="<?php echo $respuesta["nombre"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Precio: </label>
                                <input class="form-control" type="number" name="preciotxteditar" id="preciotxteditar" placeholder="Precio de producto" min="1" value="<?php echo $respuesta["precio"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Stock: </label>
                                <input class="form-control" type="password" name="stocktxteditar" id="ucontratxtEditar" placeholder="Stock del producto" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Motivo: </label>
                                <input class="form-control" type="email" name="referenciatxt" id="uemailtxtEditar" placeholder="Referencia de producto" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Categoria: </label>
                                <select name="categoriaeditar" class="form-control">
                                	<?php
                                		$respuesta_categoria = Datos::obtenerCategoryModel("categories");
                                		foreach ($respuesta_categoria as $row => $item) {
                                		
                                	?>
                                	<option value="<?php echo $item["id"]; ?>"><?php echo $item["nombre"]; ?></option>
                                	<?php 
                                	}
                                	?>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
		<?php 	
		} 

		public function actualizarProductController(){
			if (isset($_POST["codigotxteditar"])) {
				$datosController = array("id"=>$_POST["idProductEditar"],"codigo"=>$_POST["codigotxteditar"],"precio"=>$_POST["preciotxteditar"],"stock"=>$_POST["stocktxteditar"],"categoria"=>$_POST["categoriaeditar"],"nombre"=>$_POST["nombretxteditar"]);
				$respuesta = Datos::actualizarProductsModel($datosController,"products");

				if ($respuesta == "success") {
					//$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxteditar"],"producto"=>$_POST["idProductEditar"],"note"=>$_SESSION["nombre_usuario"]." agrego/compra","reference"=>$_POST["referenciatxteditar"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon">
									Exito
								</h5>
								Producto actualizado con exito
							</div>
						</div>
						';
				}else{
					echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de actualizar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		public function addProductController(){
			$datosController=$_GET["idProductAdd"];
			$respuesta = Datos::editarProductsModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Agregar</b> stock al Producto</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=inventario">
                            <div class="form-group">
                                <input type="hidden" name="idProductAdd" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Stock: </label>
                                <input class="form-control" type="number" min="1" name="addstocktxt" id="stock" placeholder="Stock del producto" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Motivo: </label>
                                <input class="form-control" type="text" name="referenciatxtadd" id="referencia" placeholder="Referencia de producto" required>
                            </div>
                           
                            <button class="btn btn-primary" type="submit">Realizar Cambio</button>
                        </form>
                    </div>
                </div>
            </div>
			<?php
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
								<input class="form-control" type="text" name="ausuariotxt" placeholder="Ingrese Apellido" required>
							</div>
							<div class="form-group">
								<label>Usuario: </label>
								<input class="form-control" type="text" name="usuariotxt" placeholder="Ingrese Usuario" required>
							</div>
							<div class="form-group">
								<label>Contraseña: </label>
								<input class="form-control" type="text" name="ucontratxt" placeholder="Ingrese Contraseña" required>
							</div>
							<div class="form-group">
								<label>Correo Electronico: </label>
								<input class="form-control" type="text" name="uemailtxt" placeholder="Ingrese Correo" required>
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
				
				$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"],PASSWORD_DEFAULT);

				$datosController = array("nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);

				$respuesta = Datos::insertarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
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
							<div class="alert alert-danger alert-dismissible">
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
                                <input type="hidden" name="iduserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
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
                                <input class="form-control" type="password" name="ucontratxtEditar" id="ucontratxtEditar" placeholder="Ingrese la nueva contraseña" required>
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
<?php } 

        public function actualizarUserController(){
        	if (isset($_POST["nusuariotxtEditar"])) {
        		$_POST["contratxtEditar"]=password_hash($_POST["ucontratxtEditar"],PASSWORD_DEFAULT);

        		$datosController = array("nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["ucontratxtEditar"],"email"=>$_POST["uemailtxtEditar"],"id"=>$_POST["iduserEditar"]);

				$respuesta = Datos::actualizarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario actualizado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de actualizar un usuario
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
							<div class="alert alert-danger alert-dismissible">
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
			if (isset($_POST["txtuser"]) && isset($_POST["txtpassword"])){
				$datosController=array("user" => $_POST["txtUser"],
										 "password" => $_POST["txtPassword"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["txtUser"] && $respuesta["contrasena"] == $_POST["txtPassword"]){
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["nombre_usuario"] = $respuesta["usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("location:index.php?action=tablero");
				}else{
					header("location: index.php?action=fallo&res=fallo");
				}

			}else{
				//echo ''.$_POST['txtuser']." ".$_POST['txtpassword'];
			}
		}

		//Controlador para cargar todos los datos de lo usuarios, la contraeña no se puede cargar debido a que independientemente de si se muestra o no, esta está encriptada.
        public function vistaUsersController(){
            $respuesta = Datos::vistaUserModel("users");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios&idUserEditar='.$item["user_id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit">Editar</i></a>
                        </td>
                        <td>
                        	<a href="index.php?action=usuarios&idBorrar='.$item["user_id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash">Eliminar</i></a>
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

        //Controlador para cargar todos los datos de lo usuarios, la contraeña no se puede cargar debido a que independientemente de si se muestra o no, esta está encriptada.
        public function vistaProductsController(){
            $respuesta = Datos::vistaProductsModel("products");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit">Editar</i></a>
                        </td>
                        <td>
                        	<a href="index.php?action=inventarios&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash">Eliminar</i></a>
                        </td>
                        <td>'.$item["id"].'</td>
                        <td>'.$item["codigo"].'</td>
                        <td>'.$item["producto"].'</td>
                        <td>'.$item["fecha"].'</td>
                        <td>'.$item["precio"].'</td>
                        <td>'.$item["stock"].'</td>
                        <td>'.$item["categoria"].'</td>
                        <td>
                            <a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit">Editar</i></a>
                        </td>
                        <td>
                        	<a href="index.php?action=inventarios&idProductDel='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash">Eliminar</i></a>
                        </td>
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
	}
        
  ?>
