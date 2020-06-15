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

		//controlador del formulario registro de producto
		public function registrarProductController(){
			?>
			<div class="col-md-6 mt-3">
			<div class="card card-primary">
			<div class="card-header">
				<h4><b>Registro</b> de Productos</h4>
			</div>
			    <div class="card-body">
			      <p class="login-box-msg">Registro de Productos</p>

			      <form action="index.php?action=inventario" method="post">
			      <div class="form-group">
			        <label>Codigo: </label>
			          	<input type="text" class="form-control" name="codigotxt" placeholder="Codigo" required>
			      </div>
			      <div class="form-group">
			        <label>Nombre: </label>
			          <input type="text" class="form-control" name="nombretxt" placeholder="Nombre" required>
			      </div>
			      <div class="form-group"> 
			        <label>Precio: </label>
			          <input type="number" class="form-control" name="preciotxt" placeholder="Precio" required>
			      </div>
			      <div class="form-group">
			        <label>Stock: </label>
			          <input type="number" class="form-control" name="stocktxt" placeholder="Stock" required>
			      </div>
			      <div class="form-group">
			        <label>Motivo: </label>
			          <input type="text" class="form-control" name="referenciatxt" placeholder="Motivo" rquired>
			      </div>
			      <div class="form-group">
			        <label>Categoria: </label>
			        <select name="categoria" class="form-control">
			        		<?php
			        			$respuesta_categoria = Datos::obtenerCategoryModel("categories");
			        			foreach($respuesta_categoria as $row => $item) {
			        		?>
			        			<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
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
			  </div>
			<?php
		}

		/*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion 
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/
		public function insertarProductController(){
			if (isset($_POST["codigotxt"])) {
                $datosController = array("codigo"=>$_POST["codigotxt"], "precio"=>$_POST["preciotxt"], "stock"=>$_POST["stocktxt"], "categoria"=>$_POST["categoria"], "nombre"=>$_POST["nombretxt"]);
				$respuesta = Datos::insertarProductsModel($datosController,"products");

				if ($respuesta == "success") {
					$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxt"],"producto"=>$respuesta3["id"],"note"=>$_SESSION["nombre_usuario"]." agrego/compra","reference"=>$_POST["referenciatxt"]);
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

		//controlador para la vista de editar producto, llama al modelo para traer el registro a editar de la tabla productos
		public function editarProductController(){
			$datosController = $_GET["idProductEditar"];
			//llama al modelo para ejecutar sentencia select y traer los datos del producto a editar
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
                                <label for="codigotxteditar">Código:</label>
                                <input type="text" name="codigotxteditar" id="codigotxteditar" class="form-control" value="<?php echo $respuesta["codigo"]; ?>" placeholder="Código de producto" required>
                            </div>

                            <div class="form-group">
                                <label for="nombretxteditar">Nombre del producto:</label>
                                <input type="text" name="nombretxteditar" id="nombretxteditar" class="form-control" value="<?php echo $respuesta["nombre"]; ?>" placeholder="Nombre del producto" required>
                            </div>

                            <div class="form-group">
                                <label for="preciotxteditar">Precio del producto:</label>
                                <input class="form-control" name="preciotxteditar" id="preciotxteditar" type="number" min="1" value="<?php echo $respuesta["precio"]; ?>" placeholder="Precio del producto" required>
                            </div>

                            <div class="form-group">
                                <label for="stocktxteditar">Stock:</label>
                                <input class="form-control" name="stocktxteditar" id="stocktxteditar" type="number" min="1" value="<?php echo $respuesta["stock"]; ?>" placeholder="Stock del producto" required>
                            </div>

                            <div class="form-group">
                                <label for="referenciatxteditar">Motivo:</label>
                                <input type="text" name="referenciatxteditar" id="referenciatxteditar" class="form-control" placeholder="Mótivo de la modificación" required>
                            </div>

                            <div class="form-group">
                                <label for="categoriaeditar">Categoría:</label>
                                <select name="categoriaeditar" id="categoriaeditar" class="form-control">
                                    <?php
                                        $respuesta_categoria = Datos::obtenerCategoryModel("categories");
                                        foreach ($respuesta_categoria as $row => $item){
                                    ?>
                                        <option value="<?php echo $item["id"]; ?>">
                                            <?php echo $item["categoria"]; ?>
                                        </option>
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

		//controlador para actualizar datos del producto, llama al modelo para ejecutar un update al registro de la tabla products
		public function actualizarProductController(){
			if (isset($_POST["codigotxteditar"])) {
				$datosController = array("id"=>$_POST["idProductEditar"],"codigo"=>$_POST["codigotxteditar"],"precio"=>$_POST["preciotxteditar"],"stock"=>$_POST["stocktxteditar"],"categoria"=>$_POST["categoriaeditar"],"nombre"=>$_POST["nombretxteditar"]);
				//lama al modelo para ejecutar sentencia update
				$respuesta = Datos::actualizarProductsModel($datosController,"products");

				if ($respuesta == "success") {
					//se insertar registro de los cambios en tabla historial
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

		//Controlador para eliminar un producto, llama al modelo para ejecutar una sentencia delete a la tabla productos.
        public function eliminarProductController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::eliminarProductsModel($datosController, "products");
                if($respuesta == "success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Éxito!
                                </h5>
                                Producto eliminado con éxito.
                            </div>
                        </div>
                    ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de eliminar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
                }
            }
        }

        //controlador para añadir piezas a stock del producto, se llama al modelo para traer el stock del registro a editar
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

		//metodo actualiza la cantidad en el stock en edicion, se llama al modelo para realizar un update a el stock del registro
		public function actualizarStockController(){
			if (isset($_POST["addstocktxt"])) {
				$datosController = array("id"=>$_POST["idProductAdd"],"stock"=>$_POST["addstocktxt"]);
				$respuesta = Datos::pushProductsModel($datosController,"products");

				if ($respuesta == "success") {
					//realiza insert en el histrorial sobre los cambios realizados
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["addstocktxt"],"producto"=>$_POST["idProductAdd"],"note"=>$_SESSION["nombre_usuario"]." agrego/compra","reference"=>$_POST["referenciatxtadd"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Exito!
								</h5>
								Stock modificado con éxito
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
                                Se ha producido un error al momento de modificar el Stock del producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		//metodo para actualizar la cantidad del stock restado, se llama al modelo para realizar un update a el stock del registro
		public function actualizar2StockController(){
			if (isset($_POST["delstocktxt"])) {
				$datosController = array("id"=>$_POST["idProductDel"],"stock"=>$_POST["delstocktxt"]);
				$respuesta = Datos::pullProductsModel($datosController,"products");

				if ($respuesta == "success") {
					//$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["delstocktxt"],"producto"=>$_POST["idProductDel"],"note"=>$_SESSION["nombre_usuario"]." quito","reference"=>$_POST["referenciatxtdel"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Éxito!
								</h5>
								Stock modificado con éxito
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
                                Se ha producido un error al momento de modificar el Stock del producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		//metodo para la vista de eliminar en el stock del producto, se llama al modelo para traer la cantidad de stock del producto a editar
		public function delProductController(){
			$datosController=$_GET["idProductDel"];
			$respuesta = Datos::editarProductsModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Eliminar</b> stock al Producto</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=inventario">
                            <div class="form-group">
                                <input type="hidden" name="idProductDel" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock: </label>
                                <input class="form-control" type="number" min="1" max="<?php echo $respuesta["stock"]; ?>" value="<?php echo $respuesta["stock"]; ?>" name="delstocktxt" id="stock" placeholder="Stock del producto" value required>
                            </div>
                            <div class="form-group">
                                <label for="motivo">Motivo: </label>
                                <input class="form-control" type="text" name="referenciatxtdel" id="referencia" placeholder="Referencia de producto" required>
                            </div>
                           
                            <button class="btn btn-primary" type="submit">Realizar Cambio</button>
                        </form>
                    </div>
                </div>
            </div>
			<?php
		}

		//metodo para mostrar vista del historial
		public function vistaHistorialController(){
			$respuesta = Datos::vistaHistorialModel("historial");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
                        <td>'.$item["usuario"].'</td>
                        <td>'.$item["producto"].'</td>
                        <td>'.$item["nota"].'</td>
                        <td>'.$item["cantidad"].'</td>
                        <td>'.$item["referencia"].'</td>
                        <td>'.$item["fecha"].'</td>
                    </tr>
					';
			}

		}

		//Controlador para cargar todos los datos de lo usuarios, la contraeña no se puede cargar debido a que independientemente de si se muestra o no, esta está encriptada.
        public function vistaCategoriesController(){
            $respuesta = Datos::vistaCategoriesModel("categories");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=categorias&idCategoryEditar='.$item["idc"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                        	<a href="index.php?action=categorias&idBorrar='.$item["idc"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["idc"].'</td>
                        <td>'.$item["ncategoria"].'</td>
                        <td>'.$item["dcategoria"].'</td>
                        <td>'.$item["fcategoria"].'</td>
                    </tr>
                ';
            }
        }

        //controlador para mostrar vista de registrar nueva categoria
        public function registrarCategoryController(){
			?>
            <div class="col-md-6 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><b>Registro</b> de Categorias</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=categorias">
                           
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre de la Categoría: </label>
                                <input class="form-control" type="text" name="ncategoriatxt" id="ncategoriatxt" placeholder="Ingrese Nombre de categoria" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Descripcion de la Categoría: </label>
                                <input class="form-control" type="text" name="dcategoriatxt" id="dcategoriatxt" placeholder="Descripcion de categoria" required>
                            </div>
                            
                            <button class="btn btn-primary" type="submit">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
<?php 	}

		//controlador para realizar el insert de una nueva categoria
		 public function insertarCategoryController(){
			if (isset($_POST["ncategoriatxt"]) && isset($_POST["dcategoriatxt"])) {
				$datosController = array("nombre_categoria"=>$_POST["ncategoriatxt"],"descripcion_categoria"=>$_POST["dcategoriatxt"]);
				$respuesta = Datos::insertarCategoryModel($datosController,"categories");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Éxito!
								</h5>
								Categoria agregada con éxito
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
                                Se ha producido un error al agregar Categoria, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		//contrlador para vista de edicion de una categoria
		public function editarCategoryController(){
			$datosController = $_GET["idCategoryEditar"];
			$respuesta = Datos::editarCategoryModel($datosController,"categories");
			?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Categorias</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=categorias">
                            <div class="form-group">
                                <input type="hidden" name="idCategoryEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="n">Nombre de Categoría: </label>
                                <input class="form-control" type="text" name="ncategoriatxteditar" id="ncateopriatxt" placeholder="Ingrese el nombre de la categoria" value="<?php echo $respuesta["nombre_categoria"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="a">Descripcion de la Categoría: </label>
                                <input class="form-control" type="text" name="dcategoriatxteditar" id="dcategoriatxt" placeholder="Ingrese la descripción de la categoria" value="<?php echo $respuesta["descripcion_categoria"]; ?>" required>
                            </div>
                            
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
		<?php 	
		} 

		//controlador para llamar al modelo para realizar la sentencia update y actualizar la categoria
		public function actualizarCategoryController(){
			if (isset($_POST["ncategoriatxteditar"]) && isset($_POST["dcategoriatxteditar"])) {
				$datosController = array("id"=>$_POST["idCategoryEditar"],"nombre_categoria"=>$_POST["ncategoriatxteditar"],"descripcion_categoria"=>$_POST["dcategoriatxteditar"]);
				$respuesta = Datos::actualizarCategoryModel($datosController,"categories");
				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Éxito!
								</h5>
								Categoría editada con éxito
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
                                Se ha producido un error al editar Categoría, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		//controlador para eliminar la categoria, llama al modelo para ejecutar la sentencia delete
		public function eliminarCategoryController(){
			if (isset($_GET["idBorrar"])) {
				$datosController = $_GET["idBorrar"];
				$respuesta = Datos::eliminarCategoryModel($datosController,"categories");
				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Éxito!
								</h5>
								Categoría eliminada con éxito
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
                                Se ha producido un error al eliminar Categoría, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		//controlador para vista de registro de un nuevo usuario, vista de ingreso(login)
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
			        <div class="input-group mb-3">
			          <select class="form-control" name="tipo" required>
							<option value="Cajero">Cajero</option>
							<option value="Administrador">Administrador</option>
					  </select>
			          <div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-user"></span>
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

		//controlador para mostrar vista de registro de nuevo usuario, vista de lista de usuarios.
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
								<input type="text" class="form-control" name="nusuariotxt" placeholder="Nombre">
							</div>
							<div class="form-group">
								<label>Apellido: </label>
								<input type="text" class="form-control" name="ausuariotxt" placeholder="Apellido">
							</div>
							<div class="form-group">
								<label>Usuario: </label>
								<input type="text" class="form-control" name="usuariotxt" placeholder="Nombre de usuario">
							</div>
							<div class="form-group">
								<label>Contraseña: </label>
								<input type="password" class="form-control" name="ucontratxt" placeholder="Contraseña">
							</div>
							<div class="form-group">
								<label>Correo Electronico: </label>
								<input type="email" class="form-control" name="uemailtxt" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Tipo de usuario: </label>
								<select class="form-control" name="tipo" required>
									<option value="Cajero">Cajero</option>
									<option value="Administrador">Administrador</option>
								</select>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		//controlador para insertar usuario, se llama al modelo para realizar insert a la tabla users
		public function insertarUserController(){
			if (isset($_POST["nusuariotxt"])) {
				
				$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"],PASSWORD_DEFAULT);

				$datosController = array("nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"],"tipo"=>$_POST["tipo"]);

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

		//controlador para mostrar vista de edicion de usuarios, ejecuta el modelo para traer el registro del usuario a editar.
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
                            <div class="form-group">
								<label>Tipo de usuario: </label>
								<select class="form-control" name="tipo" required>
									<option value="Cajero">Cajero</option>
									<option value="Administrador">Administrador</option>
								</select>
							</div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
<?php } 

		//controlador para actualizar el usuario, llama al modelo para realizar la sentencia update
        public function actualizarUserController(){
        	if (isset($_POST["nusuariotxtEditar"])) {
        		$_POST["contratxtEditar"]=password_hash($_POST["ucontratxtEditar"],PASSWORD_DEFAULT);

        		$datosController = array("nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["ucontratxtEditar"],"email"=>$_POST["uemailtxtEditar"],"id"=>$_POST["iduserEditar"],"tipo"=>$_POST["tipo"]);

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

        //controlador para eliminar el usuario, llama al modelo delete
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
				$datosController=array("user" => $_POST["txtuser"],
										 "password" => $_POST["txtpassword"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "users");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["txtuser"] && (password_verify($_POST["txtpassword"], $respuesta["contrasena"]) || $_POST["txtpassword"] == $respuesta["contrasena"])){
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					$_SESSION["tipo"]=$respuesta["type_user"];
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
                        <td>'.$item["type_user"].'</td>
                        <td>'.$item["date_added"].'</td>
                    </tr>
                ';
            }
        }

        //Controlador para mostrar la vista de los registro de la tabla productos
        public function vistaProductsController(){
            $respuesta = Datos::vistaProductsModel("products");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="index.php?action=inventario&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["id"].'</td>
                        <td>'.$item["codigo"].'</td>
                        <td>'.$item["producto"].'</td>
                        <td>'.$item["fecha"].'</td>
                        <td>'.$item["precio"].'</td>
                        <td>'.$item["stock"].'</td>
                        <td>'.$item["categoria"].'</td>
                        <td><a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Agregar Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
                        <td><a href="index.php?action=inventario&idProductDel='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
                    </tr>
                ';
            }
        }

        //controlador para mostrar vista de registro de nuevo cliente.
		public function registrarClienteController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de Cliente</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=ventas&registrar&nuevocliente">
							<div class="form-group">
								<label>Nombre: </label>
								<input type="text" class="form-control" name="nclientetxt" placeholder="Nombre" required>
							</div>
							<div class="form-group">
								<label>Apellido: </label>
								<input type="text" class="form-control" name="aclientetxt" placeholder="Apellido" required>
							</div>
							<div class="form-group">
								<label>Telefono: </label>
								<input type="number" class="form-control" name="telefonotxt" placeholder="Telefono" required>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		//controlador para realizar el insert de un nuevo cliente
		 public function insertarClienteController(){
			if (isset($_POST["nclientetxt"]) && isset($_POST["aclientetxt"])) {
				$datosController = array("nombre"=>$_POST["nclientetxt"],"apellido"=>$_POST["aclientetxt"],"telefono"=>$_POST["telefonotxt"]);
				$respuesta = Datos::insertarClienteModel($datosController,"clientes");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<div class="alert alert-success alert-dismissible">
								<h5>
									<i class="icon" fas fa-check>
									¡Éxito!
								</h5>
								Cliente agregado con éxito
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
                                Se ha producido un error al agregar el Cliente, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}


        //controlador para mostrar vista del registro de ventas
        public function registrarVentaController($tipo){    	
        	
            ?>
        <div class="row">
            <div class="col-12 col-sm-7">
            <div class="card">
              <div class="card-header bg-secondary">
                <h3 class="card-title">Detalles de la venta</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              	<table class="table table-hover text-nowrap">
                  <thbody>
                  <tr>
                  		<select class="form-control">
                  			<option value="Público en general">Público en general</option>
                  			<?php
                  			
                  			$respuesta = Datos::vistaClientesModel("clientes");
                  			foreach ($respuesta as $row => $item){
                  				echo '<option value="'.$item["nombre"].' '.$item["apellido"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';
                  			}
                  			
                  			?>
                  		</select>
                  	<div class="btn-group">

		                <a href="index.php?action=ventas&registrar&registrarcliente"><button type="button" class="btn btn-default">Add Cliente  <i class="nav-icon fas fa-user">					
						</i></button></a>
						<?php
						if ($tipo=='Administrador') {
						?>
		                <a href="index.php?action=inventario"><button type="button" class="btn btn-default">Producto  <i class="nav-icon fas fa-box">					
						</i></button></a>
						<?php
						}
						?>
		            </div>
                  </tr>
                  </tbody>
                </table>

                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Precio Unitario</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Producto 1</td>
                      <td>$ 2300.00</td>
                      <td>1</td>
                      <td>$ 4600.00</td>
                    </tr>
                    <tr>
                        <td>Producto 2</td>
                        <td>$ 5120.00</td>
                        <td>1</td>
                        <td>$ 5120.00</td>
                      </tr>
                  </tbody>
                  <tfooter>
                    <tr style="text-align: right;">
                        <th colspan="1">Recuento de productos (2)</th>
                        <th colspan="2">Impuesto neto excluido</th>
                        <td colspan="1">$ 11,720.00</td>
                    </tr>
                    <tr style="text-align: right;">
                        <th colspan="3">Descuento en carro</th>
                        <td colspan="1">$ 0.00</td>
                    </tr>
                    <tr style="text-align: right;">
                        <th colspan="3">Envío</th>
                        <td colspan="1">$ 0.00</td>
                    </tr>
                    <tr style="text-align: right;">
                        <th colspan="1">Total impuestos</th>
                        <td colspan="1">$ 0.00</td>
                        <th colspan="1">Pago Neto</th>
                        <td colspan="1">$ 11,720.00</td>
                    </tr>
                    
                  </tfooter>
                </table>
              </div><!-- /.card-body -->
            </div><!-- /.card -->


            <div class="btn-group">
                <button type="button" class="btn btn-success">Pagar</button>
                <button type="button" class="btn btn-warning">Descuento</button>
                <button type="button" class="btn btn-danger">Cancelar</button>
              </div>

            </div><!-- /.col-sm-6 izquierda-->

            <div class="col-12 col-sm-5">
            <div class="card card-secondary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <?php
                  	$respuesta = Datos::vistaCategoriesModel("categories");
                  	foreach ($respuesta as $row => $item){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" id="<?php echo $item['ncategoria'];?>tab" data-toggle="pill" href="#<?php echo $item['ncategoria'];?>" role="tab" aria-controls="<?php echo $item['ncategoria'];?>tab" aria-selected="false"><?php echo $item['ncategoria']; ?></a>
                  </li>
                  <?php
              		}
                  ?>
                </ul>
              </div>
              <div class="card-body" style="height: 500px; overflow: scroll;">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!--<div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    
                    <div class="row mt-2">
                        <div class="col-sm-4" style="text-align: center;">
                            <span class="mailbox-attachment-icon has-img"><img src="views/assets/dist/img/photo2.png" alt="Attachment"></span>
                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name">
                                    <small>Producto 1 <br/> 2,300.00 (5)</small>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-4" style="text-align: center;">
                            <span class="mailbox-attachment-icon has-img"><img src="views/assets/dist/img/photo2.png" alt="Attachment"></span>
                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name">
                                    <small>Producto 2 <br/> 6,300.00 (2)</small>
                                </a>
                            </div>
                        </div>
                    </div> 

                  </div>-->
                  <?php
                  	$respuesta = Datos::vistaCategoriesModel("categories");
                  	foreach ($respuesta as $row => $item){
                  ?>
                  <div class="tab-pane fade" id="<?php echo $item['ncategoria']; ?>" role="tabpanel" aria-labelledby="<?php echo $item['ncategoria']; ?>">
                 	<div class="row mt-2">

                 	<?php
                 	$respuesta2 = Datos::vistaCategories2Model($item["idc"],"products");
                  	foreach ($respuesta2 as $row2 => $item2){
                 	?>
                        <div class="col-sm-4" style="text-align: center;">
                            <span class="mailbox-attachment-icon has-img"><img src="views/assets/dist/img/photo2.png" alt="Attachment"></span>
                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name">
                                    <small><?php echo $item2['name_product']; ?><br/> <?php echo "$".$item2['price_product']; ?> (<?php echo $item2['stock']; ?>)</small>
                                </a>
                            </div>
                        </div>
                    <?php
                	}
                    ?>

                    </div> 
                  </div>
                  <?php
                  	}
                  ?>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div><!-- /. col-sm-6 derecha -->
        </div>


            <?php
        }

        //controlador para mostrar los boxes de las filas de las tablas, vista del tablero
        public function contarFilas($tipo){
        	$respuesta_users = Datos::contarFilasModel("users");
        	$respuesta_products = Datos::contarFilasModel("products");
        	$respuesta_historial = Datos::contarFilasModel("historial");
        	$respuesta_categories = Datos::contarFilasModel("categories");
        	$respuesta_ventas = Datos::contarFilasModel("ventas");

        	if($tipo!='Cajero'){
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
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>'.$respuesta_products["filas"].'</h3>
                            <p>Total de Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>'.$respuesta_categories["filas"].'</h3>
                            <p>Total de Categorias</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=categorias">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>'.$respuesta_historial["filas"].'</h3>
                            <p>Total de Historial</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>'.$respuesta_ventas["filas"].'</h3>
                            <p>Total de Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=ventas">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
            }else{
            	echo '
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>'.$respuesta_ventas["filas"].'</h3>
                            <p>Total de Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=ventas">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
            }
        }
	}
        
  ?>
