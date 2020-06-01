<?php
$ingreso = new MvcController();
$ingreso->ingresoUserController();
?>
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Inventario UPV</b> 2020</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      <form action="index.php?action=ingresar" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtuser" placeholder="User" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <p class="mb-0">
        <a href="index.php?action=registrarUsuario" class="text-center">Registrar nuevo Usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->