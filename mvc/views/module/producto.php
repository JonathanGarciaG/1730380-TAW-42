<?php
//validacion del inicio de sesion
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}

	//se llama al controlador para llamar a la vista de la tabla y el metodo para detectar el borrar
	$vistaUsuario = new MvcController();
	$vistaUsuario -> borrarProductoController();

?>
<br>
<br>
<br>

<H1>PRODUCTOS</H1>

<TABLE class="table-bordered table-primary">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio de venta</th>
			<th>Precio de compra</th>
			<th>Inventario</th>
			<th>¿Editar?</th>
			<th>¿Eliminar?</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//vista de los datos de la tabla
			$vistaUsuario -> vistaProductosController();
		?>
	</tbody>
</TABLE>
<?php
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "cambioproduct") {
			echo "<h4>Cambio exitoso</h4>";
		}
	}
?>