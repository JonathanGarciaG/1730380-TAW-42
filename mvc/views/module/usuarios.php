<?php
//validacion del inicio de sesion
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}

//se llama al controlador para llamar a la vista de la tabla y el metodo para detectar el borrar
	$vistaUsuario = new MvcController();
	$vistaUsuario -> borrarUsuarioController();

?>
<br>
<br>
<br>

<H1>USUARIOS</H1>

<TABLE class="table-bordered table-primary">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>¿Editar?</th>
			<th>¿Eliminar?</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$vistaUsuario -> vistaUsuariosController();
		?>
	</tbody>
</TABLE>
<?php
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "cambio") {
			echo "<h4>Cambio exitoso</h4>";
		}
	}
?>