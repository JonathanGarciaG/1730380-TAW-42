<div class="register-box">
<?php
$registro=new MvcController();
$registro->insertarUserController();
?>
  <div class="register-logo">
    <a href="index.php"><b>Inventario UPV </b>2020</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrar nuevo Usuario</p>

      <form action="index.php?action=registrarUsuario" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nusuariotxt" placeholder="Nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ausuariotxt" placeholder="Apellido">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuariotxt" placeholder="Nombre de usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="uemailtxt" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="ucontratxt" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
                <select class="form-control" name="tipo" required>
              <option value="Cajero">Cajero</option>
              <option value="Administrador">Administrador</option>
            </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <a href="index.php?action=ingresar" class="text-center">Inicio de sesión</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

</div>
<!-- /.register-box -->