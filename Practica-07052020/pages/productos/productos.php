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
      Productos
    </span>
  </div>
</nav>
<br>
<!-- Containers de bootstrap -->
<div class="container">
  <h3>Productos</h3>
  <div class="row mb-4">
    <a href="agregarForm.php"><button type="button" class="btn btn-success">Agregar</button></a>
  </div>

  <!-- Tabla de bootstrap -->
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Precio Compra</th>
      <th scope="col">Color</th>
      <th scope="col">Categoria</th>
      <th scope="col"> </th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php
      //Se realiza una consulta para traer todos los registros de la tabla productos
      $sql = "SELECT * FROM productos";
      $res = $conn->query($sql);

      //mediante un ciclo se imprimen los registros
      while($row = $res->fetch_assoc()) {
    ?>
    <tr>
      <!-- Se imprimen los datos de los campos mediante php -->
      <th scope="row"><?php echo $row["id"]; ?></th>
      <td><?php echo $row["nombre"]; ?></td>
      <td><?php echo $row["descripcion"]; ?></td>
      <td><?php echo $row["precio_venta"]; ?></td>
      <td><?php echo $row["precio_compra"]; ?></td>
      <td><?php echo $row["color"]; ?></td>
      <?php
        $sql = "SELECT nombre FROM categoria WHERE id = ".$row['categoria'];
        $result = mysqli_query($conn, $sql);
        //Se hace una validacion para ver si la categoria aun existe
        if($datos = mysqli_fetch_array($result)){
          $nombre = $datos["nombre"];
        }else{
          $nombre = "-";
        }
      ?>
      <td><?php echo $nombre; ?></td>
      <!-- Botones que llevan a los archivos de edicion y eliminacion del registro -->
      <td><a href="editarForm.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary">Editar</button></a></td>
      <td><a href="eliminar.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Borrar</button></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
  </table>
</div>

    <!-- Optional JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>