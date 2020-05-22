<?php
//validacion de sesion iniciada si es falso manda a la pagina de login para ingresar
    session_start();
    if (!$_SESSION["validar"]) {
        header("location: index.php?m=login");
        exit();
    }
?>
<!-- Pagina del universidades que muestra la tabla de registros de los estudiantes -->
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registros de Universidades</h2>
        <a href="index.php?m=registrarUniversidades" class="btn btn-primary">Agregar</a>
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th>
                            <a href="index.php?m=universidad&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteU&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>