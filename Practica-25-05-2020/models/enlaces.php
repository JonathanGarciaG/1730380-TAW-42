<?php
    //Clase para el Modelo de enlaces web 
	class Paginas{
		public function enlacesPaginasModel($enlaces){
			$pagina = 'views/modules/tablero.php';
			if ($enlaces == 'tablero') {
				$pagina = 'views/modules/tablero.php';
			}else if ($enlaces == 'usuarios') {
				$pagina = 'views/modules/usuarios.php';
			}else if ($enlaces == 'inventario') {
				$pagina = 'views/modules/inventario.php';
			}else if ($enlaces == 'categorias') {
				$pagina = 'views/modules/categorias.php';
			}else if ($enlaces == 'ingresar') {
				$pagina = 'views/modules/login.php';	
			}else if ($enlaces == 'registrarUsuario') {
				$pagina = 'views/modules/registro.php';
			}else if ($enlaces == 'editarUsuario') {
				$pagina = 'views/modules/login.php';
			}else if ($enlaces == 'ventas') {
				$pagina = 'views/modules/ventas.php';
			}else if ($enlaces == 'salir') {
				$pagina = 'views/modules/salir.php';
			}else{
				$pagina = 'views/modules/tablero.php';
			}

			return $pagina;
		}
	}
?>