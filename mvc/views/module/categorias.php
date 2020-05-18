<?php
	//se valida si hay una sesion iniciada
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}

	//se llama al controlador para llamar a la vista de la tabla y el metodo para detectar el borrar
	$vistaUsuario = new MvcController();
	$vistaUsuario -> borrarCategoriaController();

?>
<br>
<br>
<br>

<H1>CATEGORIAS</H1>

<TABLE class="table-bordered table-primary">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>¿Editar?</th>
			<th>¿Eliminar?</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//vista de los datos de la categoria
			$vistaUsuario -> vistaCategoriasController();
		?>
	</tbody>
</TABLE>
<?php
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "cambiocategoria") {
			echo "<h4>Cambio exitoso</h4>";
		}
	}
?>