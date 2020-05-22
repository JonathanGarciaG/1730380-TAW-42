<!-- Vista del formulario del inicio de sesion del usuario al sistema -->
<div class="container">
    <div class="jumbotron">
        <h2>Ingresar</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
                <form action="index.php?m=acceder" method="post">
                <?php
                    //condicion para mostrar el mensaje de error por si se insertaron datos erroneos
                    if (isset($_GET["action"])) {
                        if($_GET["action"]=="error"){
                            echo "<H4>Datos de usuario no encontrados</H4>";
                        }
                    }
                ?>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">USUARIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_user" value="<?php if(isset($data['id'])){ echo $data['cedula']; } ?>" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">CONTRASEÑA:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="txt_pass" value="<?php if(isset($data['id'])) echo $data['nombre']; ?>" required>
                    </div>
                    
                </div>
                    
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                        <input type="submit" class="btn btn-primary form-control" name="" value="Acceder">                 
                    </div>
                </div>
                <a href="index.php?m=registro">Registrar usuario</a>
            </form>
            
        </div>
    </div>
    
</div>