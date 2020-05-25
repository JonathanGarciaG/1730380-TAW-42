<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
</head>
<body>
<header>
  <!-- barra de navegacion del header -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php?m=estudiante">Nuevo registro Estudiantes</a></li>
              <li>
                <a href="index.php?m=universidades" role="button" aria-haspopup="true" aria-expanded="false">Universidades</span></a>
              </li>
              <li>
                <a href="index.php?m=carreras" role="button" aria-haspopup="true" aria-expanded="false">Carreras</span></a>
              </li>
              <li>
                <a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Estudiantes</span></a>
              </li>
                <li>
                  <a href="index.php?m=salir">Salir</a>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>