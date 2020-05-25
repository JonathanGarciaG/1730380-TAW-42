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
        <h2>formulario registro</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">

            <?php 
            //Se define el tipo de form con el metodo que se requiere
            // form para crear registro, se llama al metodo get_datosE para decidir el registro o la modificacion de los datos
            if (!isset($data)){ ?>
                <form action="index.php?m=get_datosE" method="post">
            <?php } ?>
            <?php 
            //form para modigicar un registro, se envia el parametro el id del registro que se desea modificar
            if (isset($data['id']))
                if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosE&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">CEDULA:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_cedula" value="<?php if(isset($data['id'])){ echo $data['cedula']; } ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php if(isset($data['id'])) echo $data['nombre']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_apellidos">APELLIDOS:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_apellidos" value="<?php if(isset($data['id'])) echo $data['apellidos']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_promedio">PROMEDIO:</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" name="txt_promedio" value="<?php if(isset($data['id'])) echo $data['promedio']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_edad">EDAD:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_edad" value="<?php if(isset($data['id'])) echo $data['edad']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">FECHA:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="txt_fecha" value="<?php if(isset($data['id'])) echo $data['fecha']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">CARRERA:</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="txt_carrera">
                    <?php foreach($query as $data2): 
                    $universidadreg=$this->model_e->get_idU($data2['id_universidad']);?>?>
                        <!-- aqui se hace una validacion para agregar el atributo selected a la etiqueta option para tener seleccionada la opcion de la carrera y universidad actual del registro que se va a editar(En caso de editar el registro) -->
                        <option value="<?php echo $data2["id"]; ?>"  <?php if(isset($data['id'])){ if($data["id_universidad_carrera"]==$data2["id"]){ echo "selected"; } } ?> > <?php echo $data2["nombre"]." | ".$universidadreg["nombre"]; ?> </option>
                    <?php endforeach; ?>
                    </select>                    
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