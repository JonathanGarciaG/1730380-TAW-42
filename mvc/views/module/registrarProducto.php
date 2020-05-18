<?php
//validacion del inicio de sesion
	include_once "controllers/controller.php";
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}
	
	$registro = new MvcController();
	$registro -> registrarProductoController();
?>
<br>
<br>
<br>

<h1> REGISTRO DE PRODUCTO </h1>

	<form method="POST">
		<input type="text" class="form-control" placeholder="Producto" name="productoRegistro" required>
		<input type="text" class="form-control" placeholder="Descripcion" name="descripcionRegistro" required>
		<input type="number" class="form-control" placeholder="Precio de Venta" name="pvRegistro" required>
		<input type="number" class="form-control" placeholder="Precio de Compra" name="pcRegistro" required>
		<input type="number" class="form-control" placeholder="Inventario" name="inventarioRegistro" required>
		<input type="submit" class="btn btn-primary" value="Registrar">
	</form>

<?php


?>