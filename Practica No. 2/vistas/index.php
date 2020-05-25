<?php
//validacion de sesion iniciada si es falso manda a la pagina de login para ingresar
    session_start();
    if (!$_SESSION["validar"]) {
        header("location: index.php?m=login");
        exit();
    }
?>
<!-- Pagina del index que muestra la tabla de registros de los estudiantes -->
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registros de Estudiantes</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Promedio</th>
                    <th>Edad</th>
                    <th>fecha</th>
                    <th>Universidad</th>
                    <th>Carrera</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data):
                $universidad="Sin asignar";
                $carrera="Sin asignar";
                //Se obtienen los nombres de las carreras y universidades de los estudiantes
                if($data["id_universidad_carrera"]!="0"){
                    $carrerareg=$this->model_e->get_idC($data['id_universidad_carrera']);
                    $universidadreg=$this->model_e->get_idU($carrerareg['id_universidad']);
                    $universidad=$universidadreg["nombre"];
                    $carrera=$carrerareg["nombre"];
                } 
                ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['cedula']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['apellidos']; ?></th>
                        <th><?php echo $data['promedio']; ?></th>
                        <th><?php echo $data['edad']; ?></th>
                        <th><?php echo $data['fecha']; ?></th>
                        <th><?php echo $universidad; ?></th>
                        <th><?php echo $carrera; ?></th>
                        <th>
                            <a href="index.php?m=estudiante&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>