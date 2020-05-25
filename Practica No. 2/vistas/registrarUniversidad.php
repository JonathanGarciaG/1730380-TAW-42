<?php
//validacion de sesion iniciada si es falso manda a la pagina de login para ingresar
    session_start();
    if (!$_SESSION["validar"]) {
        header("location: index.php?m=login");
        exit();
    }
?>
<!--formulario para registro y modificacion de registro de estudiantes-->
<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro de Universidades</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">

            <?php 
            //Se define el tipo de form con el metodo que se requiere
            // form para crear registro, se llama al metodo get_datosE para decidir el registro o la modificacion de los datos
            if (!isset($data)){ ?>
                <form action="index.php?m=get_datosU" method="post">
            <?php } ?>
            <?php 
            //form para modigicar un registro, se envia el parametro el id del registro que se desea modificar
            if (isset($data['id']))
                if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosU&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php if(isset($data['id'])) echo $data['nombre']; ?>" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php
                        if(!isset($data['id'])){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                    <?php }  ?>
                    <?php 
                    if (isset($data['id']))
                        if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>