<?php
	if ($_GET['action'] ==  'salir') {
		header('location: index.php');
	}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-wifget="pushmenu" href="index.php?action=tablero"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
</nav>

<aside class="main-sidebar sidebar-dark-success elevation-4">
	<a href="index-php?action=tablero" class="brand-link nav-success">
		<img src="views/assets/dist/img/UPV.png" alt="inventarios / TAW / UPV" class="brand-image img-square" style="opacity: .8">
		<span class="brand-text font-weight-light">Inventarios 2020</span>
	</a>

	<!-- sidebar -->
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image"> 
				<img src="views/assets/dist/img/user2-169x169.jpg" class="img-circle elevation-2" alt="User image">
			</div>
			<div class="info">
				<a href="index.php?action=tablero" class="d-block"> <?php if (isset($_SESSION['nombre_usuario'])){
					echo $_SESSION['nombre_usuario'];
				}?> </a>
			</div>
		</div>

		<div class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="index.php?action=tablero" class="nav-link">
						<i class="nav-icon fas fa-users">
							
						</i>
						<p>Tablero</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="index.php?action=usuarios" class="nav-link">
						<i class="nav-icon fas fa-users">
							
						</i>
						<p>Usuarios</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="index.php?action=productos" class="nav-link">
						<i class="nav-icon fas fa-users">
							
						</i>
						<p>Productos</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="index.php?action=categorias" class="nav-link">
						<i class="nav-icon fas fa-users">					
						</i>
						<p>Cantegorias</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="index.php?action=salir" class="nav-link">
						<i class="nav-icon fas fa-users">
							
						</i>
						<p>Salir</p>
					</a>
				</li>

			</ul>
		</div>

	</div>

</aside>