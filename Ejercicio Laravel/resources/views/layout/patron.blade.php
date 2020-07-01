<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset-UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('titulo')</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plantilla.css') }}">
	
</head>

<script type="text/javascript" src="{{ asset('js/query-3.4.1.min.js') }}"></script>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ url('/empleados') }}" class="site_title"><span style="font-size: 19px;">Sistema control de empleados</span></a>
					</div>
					<div class="clearfix"></div>
					<br>

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
								<ul class="nav side-menu">
									<li><a href="{{url('empleados')}}">Inicio</a></li>
								</ul>

								<ul class="nav side-menu">
									<li><a href=""><i class="fas fa-user-shield"></i>&nbsp;Empleados <span style="float: right" class="fa fa-chevron-down"></span> </a>
										<ul class="nav child_menu">
											<li><a href="{{url('empleados/create')}}">Agregar empleados</a></li>
											<li><a href="{{url('empleados')}}">Consultar empleados</a></li>
										</ul>
									</li>
								</ul>
						</div>
					</div>

<!-- sidebar menu -->

					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top">
							<span class="glyphicon" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top">
							<span class="glyphicon" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" href="/password">
							<i class="fas fa-key"></i>
						</a>



					</div>
					<!-- menu footer buttons -->
				</div>
			</div>

			<!-- MUESTRA EL COTENIDO DE LA SECCION "cONTNEIDO" LA CUAL PUEDE SER LISTADO O ALTA DE EMPLEADOS -->
			@yield('contenido')

			@yield('scripts')
<!-- /page content-->
			
			<footer>
				<div class="pull-right">
					
				</div>
				<div class="clearfix"></div>
			</footer>
		</div>
	</div>
</body>
</html>

<!-- jQuery -->
<script src="{{ asset('js/plantilla.js') }}"></script>