<!doctype html>
<?php
  //Se incluye la conexion a la base de datos
  require_once 'pages/includes/conexion.php';

  //Se realizan las consultas para los numero de registros
  //Consulta COUNT de productos
  $sql = "SELECT COUNT(*) FROM productos";
  $result = mysqli_query($conn, $sql);
  $datos = mysqli_fetch_array($result);
  $tec = $datos["COUNT(*)"];
  //Consulta COUNT de categorias
  $sql = "SELECT COUNT(*) FROM categoria";
  $result = mysqli_query($conn, $sql);
  $datos = mysqli_fetch_array($result);
  $cat = $datos["COUNT(*)"];
  //Consulta COUNT de fabricantes
  $sql = "SELECT COUNT(*) FROM fabricante";
  $result = mysqli_query($conn, $sql);
  $datos = mysqli_fetch_array($result);
  $fab = $datos["COUNT(*)"];
  //Consulta COUNT de categorias de fabricantes
  $sql = "SELECT COUNT(*) FROM categoria_fabricante";
  $result = mysqli_query($conn, $sql);
  $datos = mysqli_fetch_array($result);
  $catfab = $datos["COUNT(*)"];

  mysqli_close($conn);
?>
<html lang="en">
  <head>

    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>CRUD</title>
  </head>
  <body>

<!-- Navbar de bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <!--Direcciones del navbar a las paginas-->
      <li class="nav-item">
        <a class="nav-link" href="pages/productos/productos.php">Productos </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/categorias/categorias.php">Categorias </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/fabricantes/fabricantes.php">Fabricantes </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/categoriasfabricantes/categoriasfabricantes.php">Categorias de Fabricantes </a>
      </li>
    </ul>
    <span class="navbar-text">
      Practica-07-05-2020
    </span>
  </div>
</nav>
<br>
<!-- Containers de bootstrap -->
<div class="container">

<!-- Cards de bootstrap -->
<!-- Se muestran el numero de registros que se tienen en las tablas -->
 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Productos</h5>
        <p class="card-text"><strong><?php echo $tec; ?> </strong> Registros</p>
        <a href="pages/productos/productos.php" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categorias</h5>
        <p class="card-text"><strong><?php echo $cat; ?> </strong>Registros</p>
        <a href="pages/categorias/categorias.php" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Fabricantes</h5>
        <p class="card-text"><strong><?php echo $fab; ?> </strong>Registros</p>
        <a href="pages/fabricantes/fabricantes.php" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categorias de Fabricantes</h5>
        <p class="card-text"><strong><?php echo $catfab; ?> </strong>Registros</p>
        <a href="pages/categoriasfabricantes/categoriasfabricantes.php" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>

</div>

    <!-- Optional JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>