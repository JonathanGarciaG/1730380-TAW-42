<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
<form method="POST" action="{{ url('api/empleados') }}">
<h4>Agregar Empleado</h4>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombres</label>
    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Cedula</label>
    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@example.com" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Lugar de Nacimiento</label>
    <input type="text" class="form-control" id="lugnac" name="lugar_nacimiento" placeholder="Lugar de nacimiento" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Sexo</label>
    <select name="sexo" class="form-control" required>
        <option value="masculino">masculino</option>
        <option value="femenino">femenino</option>
        <option value="no definido">no definido</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Estado Civil</label>
    <select name="estado_civil" class="form-control" required>
        <option value="soltero">soltero</option>
        <option value="casado">casado</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono</label>
    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
  </div>

  <button class="btn btn-primary btn-xs" type="submit">Agregar</button>
  
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>