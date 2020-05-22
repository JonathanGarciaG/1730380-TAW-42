<!-- Vista del formulario de registro de usuario, se realiza la insercion de un nuevo registro de usuario en la base de datos -->
<div class="container">
    <div class="jumbotron">
        <h2>Registro de usuario</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
                <form action="index.php?m=registrarUsuario" method="post">
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">USUARIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_user" value="" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">CONTRASEÑA:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="txt_pass" value="" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">EMAIL:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="txt_email" value="" required>
                    </div>
                    
                </div>
                    
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">                 
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>