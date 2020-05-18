<?php
	//modelo de enlaces web
	class Paginas{
		public function enlacesPaginasModel($enlaces){
			if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "registros" || $enlaces == "producto" || $enlaces == "registrarProducto" || $enlaces == "editar" || $enlaces == "editarProducto" || $enlaces == "categorias"  || $enlaces == "registrarCategoria" || $enlaces == "editarCategoria"){
				$module = "views/module/".$enlaces.".php";
			}
			else if($enlaces == "index"){
				$module = "views/module/registro.php";
			}
			else if($enlaces == "ok"){
				$module = "views/module/registro.php";
			}
			else if($enlaces == "okproduct"){
				$module = "views/module/producto.php";
			}
			else if($enlaces == "okcategoria"){
				$module = "views/module/categorias.php";
			}
			else if($enlaces == "fallo"){
				$module = "views/module/ingresar.php";
			}
			else if($enlaces == "cambio"){
				$module = "views/module/usuarios.php";
			}
			else if($enlaces == "cambioproduct"){
				$module = "views/module/producto.php";
			}
			else if($enlaces == "cambiocategoria"){
				$module = "views/module/categorias.php";
			}
			else if($enlaces == "salir"){
				$module = "views/module/salir.php";
			}else{
				$module = "views/module/registro.php";
			}
			return $module;
		}
	}

?>