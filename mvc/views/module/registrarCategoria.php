<?php
//validacion del inicio de sesion
	include_once "controllers/controller.php";
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}
	
	$registro = new MvcController();
	$registro -> registrarCategoriaController();
?>
<br>
<br>
<br>

<h1> REGISTRO DE CATEGORIA </h1>

	<form method="POST">
		<input type="text" class="form-control" placeholder="Nombre" name="categoriaRegistro" required>
		<input type="submit" class="btn btn-primary" value="Registrar">
	</form>

<?php


?>