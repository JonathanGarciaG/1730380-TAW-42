<?php
	//modelo de enlaces web
	class Paginas{
		public function enlacesPaginasModel($enlaces){
			if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "registros" || $enlaces = "producto" || $enlaces = "registrarProducto" || $enlaces = "editar" || $enlaces = "editarProductos"){
				$module = "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "index"){
				$module = "views/modules/registro.php";
			}
			else if($enlaces == "ok"){
				$module = "views/modules/registro.php";
			}
			else if($enlaces == "fallo"){
				$module = "views/modules/ingresar.php";
			}
			else if($enlaces == "cambio"){
				$module = "views/modules/usuarios.php";
			}else{
				$module = "views/modules/registro.php";
			}
		}
		return $module;
	}

?>