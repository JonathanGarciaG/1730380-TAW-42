<?php
	include_once "controllers/controller.php";
    //se llama al controlador para detectar el registro del usuario
	$registro = new MvcController();
	$registro -> registrarUsuarioController();
?>
<!-- Formulario para el registro de usuario -->
		<section class="page-section" id="registro">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registrar</h2>    
                <br>   
                <br>     
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form method="POST">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input type="Password" placeholder="Password" name="passwordRegistro" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input type="Email" placeholder="Email" name="emailRegistro" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><input class="btn btn-primary btn-xl" type="submit" value="Registrar"></div>
                        </form>
                    </div>
                </div>
        </section>

<!--<h1> REGISTRO </h1>

	<form method="POST">
		<input type="text" placeholder="Usuario" name="usuarioRegistro" required>
		<input type="password" placeholder="password" name="passwordRegistro" required>
		<input type="email" placeholder="email" name="emailRegistro" required>
		<input type="submit" value="Enviar">
	</form>
-->
<?php
	if (isset($_GET["action"])) {
		if($_GET["action"] == "ok"){
			echo "<h3>Registro exitoso</h3>";
		}else{
			echo "<h3>Error en el registro</h3>";
		}
	}

?>
