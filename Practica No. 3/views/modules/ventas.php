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
            $ventas->registrarVentaController($_SESSION["tipo"]);
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


<!-- Modal para aplicar un descuento -->
    <div class="modal fade" id="modal-descuento">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aplicar <b>Descuento</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div><!-- /.modal-header -->
                <form>
                    <div class="modal-body">

                            <p>Ingresa el descuento que desea aplicar.</p>

                            <div class="form-group">
                                <label for="desctxt">Descuento:</label>
                                <input type="decimal" step="any" class="form-control form-control-sm" placeholder="0" name="desctxt" id="desctxt" required>
                            </div>
                        
                    </div><!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="descontar()">Aceptar</button>
                    </div><!-- /.modal-footer -->
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->