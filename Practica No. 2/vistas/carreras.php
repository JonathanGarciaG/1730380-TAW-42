<?php
//validacion de sesion iniciada si es falso manda a la pagina de login para ingresar
    session_start();
    if (!$_SESSION["validar"]) {
        header("location: index.php?m=login");
        exit();
    }
?>
<!-- Pagina de las carreras que muestra la tabla de registros de las carreras de las distintas universidades -->
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registros de Carreras</h2>
        <a href="index.php?m=registrarCarrera" class="btn btn-primary">Agregar</a>
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Carrera</th>
                    <th>Universidad</th>
                    <th>acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): 
                $block="no";//bandera para bloquear el boton eliminar
                //trae los datos del registro de la universidad de la carrera mediante el metodo del modelo get_idU()
                $universidadreg=$this->model_e->get_idU($data['id_universidad']);?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $universidadreg['nombre']; ?></th>
                        <th>
                            <a href="index.php?m=registrarCarrera&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <?php
                            //Se hace la comprobacion si existen carreras asignadas a la universidad para bloquear el boton de eliminar
                                $estudiantes=$this->model_e->get();
                                foreach ($estudiantes as $data2) {
                                    if($data2["id_universidad_carrera"]==$data["id"]){
                                        //si coincide un id con un id de universidad en la tabla carrera se activa la bandera
                                        $block="si";
                                    }
                                }
                            ?>
                            <a href="index.php?m=confirmarDeleteC&id=<?php echo $data['id']?>" class="btn btn-danger" <?php /*si la bandera esta activada se agrega el atributo disabled*/ if($block=="si") echo "disabled" ?>>Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>