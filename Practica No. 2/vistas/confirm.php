<!-- Pagina de confirmacion de eliminacion de registro -->
<section class="container">
    <div class="row">
    <?php
    //aqui se decide que tipo de etiqueta form se utilizara y que tipo de action se tomara en base a que tipo de registro se esta utilizando
    if($_GET["m"]=="confirmarDeleteU"){
        //confirma eliminar Universidad
    ?>
    <form method="post" action="index.php?m=confirmarDeleteU&id=<?php echo "0";?>">
    <?php
    }else if ($_GET["m"]=="confirmarDeleteC") {
        //confirmar eliminar Carrera
        ?> 
    <form method="post" action="index.php?m=confirmarDeleteC&id=<?php echo "0";?>">
        <?php
    }else{
        //confirmar eliminar Estudiante
    ?>
    <form method="post" action="index.php?m=confirmarDelete&id=<?php echo "0";?>">
    <?php
    }
    ?>
        <div class="col-md-6 col-md-offset-3">
            <label>¿Deseas eliminar este registro?</label>
            <input type="hidden" name="txt_id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
        </div>
    </form>
    </div>
</section>