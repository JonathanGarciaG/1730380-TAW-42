<?php

?>
<div class="container-fluid">
	<div class="row mb-3"> </div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Inventario</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=usuarios&registrar" class="btn btn-info">Agregar Nuevo usuario</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-hover m-0 table-bordered table-triped">
							<thead class="table-info">
								<tr>
									<th>¿Editar?</th>
									<th>¿Eliminar?</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Usuario</th>
									<th>Email</th>
									<th>Fecha de insercion</th>
								</tr>
							</thead>
							<tbody>
								<?php
									//se llama al controlador para que ,uestre todas los usuarios que existen
									$usuarios->vistaUsersController();
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

?>
<div class="container-fluid">
	<div class="row mb-3"> </div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Historial</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=usuarios&registrar" class="btn btn-info">Agregar Nuevo usuario</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-hover m-0 table-bordered table-triped">
							<thead class="table-info">
								<tr>
									<th>¿Editar?</th>
									<th>¿Eliminar?</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Usuario</th>
									<th>Email</th>
									<th>Fecha de insercion</th>
								</tr>
							</thead>
							<tbody>
								<?php
									//se llama al controlador para que ,uestre todas los usuarios que existen
									$usuarios->vistaUsersController();
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>