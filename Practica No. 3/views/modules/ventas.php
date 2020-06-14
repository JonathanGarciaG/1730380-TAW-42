<?php

    //Se verifica que exita una sesion, en caso de que no sea así, se muestra el login.
    if(!isset($_SESSION['validar']) || $_SESSION['validar']== false ){
        header("location:index.php?action=ingresar");
        exit();
    }

    //Lamando a los controladores
    $ventas = new MvcController();
    $clientes = new MvcController();

?>

<div class="container-fluid">

<?php
    //Verificando si se activo una función del controlador.
    if(isset($_GET["registrarcliente"])){
            $clientes->registrarClienteController();
        }
    if(isset($_GET["nuevocliente"])){
            $clientes->insertarClienteController();
        }
    if(isset($_GET["registrar"])){
            $ventas->registrarVentaController();
        }
?>

    <div class="row mb-3">
    </div>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Ventas</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <a href="index.php?action=ventas&registrar" class="btn btn-info">Agregar Venta</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Código del Producto</th>
                                    <th>Nombre del Producto</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Tipo de Pago</th>
                                    <th>Pago</th>
                                    <th>Fecha</th>
                                    <th>Venta hecha por</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //Se llama al controlador que muestra todas las categorias que existen.
                                    //$ventas->vistaVentasController();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.container-fluid-->