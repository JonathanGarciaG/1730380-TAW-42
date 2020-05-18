<?php
	session_start();

	if (!$_SESSION["validar"]) {
		header("location: index.php?action=ingresar");
		exit();
	}

?>

<H1>EDITAR USUARIO</H1>
<form>
	<?php
		$editarUsuario = new MvcController();
		$editarUsuario -> editarUsuarioController();
		$editarUsuario -> actualizarUsuarioController();
	?>
</form>