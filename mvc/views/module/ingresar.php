<?php
//se llama el metodo para el ingreso de usuario (inicio de usuario)
$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();
?>
<!-- Formulario para el incio de sesion (Login)-->
		<section class="page-section" id="ingresar">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ingresar</h2>
                <br> 
                <br> 
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form method="POST">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input type="text" placeholder="Usuario" name="usuarioIngreso" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input type="Password" placeholder="Password" name="passwordIngreso" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><input class="btn btn-primary btn-xl" type="submit" id="sendMessageButton" value="Ingresar"></div>
                        </form>
                    </div>
                </div>
        </section>
<!--<h1> INGRESAR </h1>

	<form method="POST">
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>
		<input type="password" placeholder="password" name="passwordIngreso" required>
		<input type="submit" value="Enviar">
	</form>-->

<?php

	if (isset($_GET["action"])) {
		if($_GET["action"] == "fallo"){
			echo "Fallo al ingresar";
		}
	}


?>
