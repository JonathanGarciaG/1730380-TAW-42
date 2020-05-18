<?php
//validacion del inicio de sesion
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}

?>
<br>
<br>
<br>

<H1>EDITAR CATEGORIA</H1>
<form method="POST">
	<?php
		//se llama al controlador para ejecutar la vista del formulario para editar y el metodo para detectar la actualizacion
		$editarUsuario = new MvcController();
		$editarUsuario -> editarCategoriaController();
		$editarUsuario -> actualizarCategoriaController();
	?>
</form>