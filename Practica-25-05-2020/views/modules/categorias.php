<?php
    //Se verifica que exita una sesion, en caso de que no sea así, se muestra el login.
    if(!isset($_SESSION['validar']) || $_SESSION['validar']== false ){
        header("location:index.php?action=ingresar");
        exit();
    }

    //Llamada a los controladores para insertar/modificar/eliminar productos y su stock.
    $categoria = new MvcController();
    $categoria->insertarCategoryController();
    $categoria->actualizarCategoryController();
    $categoria->eliminarCategoryController();
    
    if(isset($_GET["registrar"])){
        $categoria->registrarCategoryController();
    } else if(isset($_GET["idCategoryEditar"])){
        $categoria->editarCategoryController();
    }
?>

<div class="container-fluid">
    <div class="row mb-3">
    </div>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Categorías</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <a href="index.php?action=categorias&registrar" class="btn btn-info">Agregar Nueva Categoría</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>¿Editar?</th>
                                    <th>¿Eliminar?</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de Inserción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //Se llama al controlador que muestra todas las categorias que existen.
                                    $categoria->vistaCategoriesController();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.container-fluid-->