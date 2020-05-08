<!doctype html>
<?php
  //Se incluye la conexion a la base de datos
  require_once '../includes/conexion.php';

  //Se recibe mediante el metodo GET el id del registro a editar
  $id=$_GET["id"];

  //Consulta y guarda los datos de el registro a editar
  $sql = "SELECT * FROM productos WHERE id = ".$id;
  $result = mysqli_query($conn, $sql);
  $datos = mysqli_fetch_array($result);
  $nombre = $datos["nombre"];
  $compra = $datos["precio_compra"];
  $venta = $datos["precio_venta"];
  $descripcion = $datos["descripcion"];
  $color = $datos["color"];
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
      Productos
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
                <h3 class="card-title">Editar Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="editar.php?id=<?php echo $id; ?>" method="post"  enctype="multipart/form-data">
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre*</label>
                        <input type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre" id="nombre" name="nombre" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio Venta*</label>
                        <input type="number" class="form-control" value="<?php echo $venta; ?>" placeholder="Venta" id="venta" name="venta" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio Compra*</label>
                        <input type="number" class="form-control" value="<?php echo $compra; ?>" placeholder="Compra" id="compra" name="compra" required> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Color*</label>
                        <input type="text" class="form-control" value="<?php echo $color; ?>" placeholder="Color" id="color" name="color" required>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descripción</label>
                        <input type="textarea" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Descripción" id="desc" name="descripcion" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Categoria*</label>
                        <select name="categoria" class="form-control" required>
                        <?php
                          //Se consultan las categorias disponibles de la base de datos
                          $sql = "SELECT * FROM categoria";
                          $res = $conn->query($sql);

                          //mediante un ciclo se imprimen los registros
                          while($row = $res->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
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