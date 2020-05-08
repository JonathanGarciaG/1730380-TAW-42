<!doctype html>
<?php
  //Se incluye la conexion a la base de datos
  require_once '../includes/conexion.php';
?>
<html lang="en">
  <head>

    <link rel="stylesheet" href="../../fontawesome-free/css/all.min.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>CRUD</title>
  </head>
  <body>

<!-- Navbar de bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../../index.php">CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../productos/productos.php">Productos </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../categorias/categorias.php">Categorias </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../fabricantes/fabricantes.php">Fabricantes </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../categoriasfabricantes/categoriasfabricantes.php">Categorias de Fabricantes </a>
      </li>
    </ul>
    <span class="navbar-text">
      Categorias
    </span>
  </div>
</nav>
<br>
<!-- Containers de bootstrap -->
<div class="container">

  <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar nueva Categoria de producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="agregar.php" method="post"  enctype="multipart/form-data">
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre*</label>
                        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
</div>

    <!-- Optional JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>