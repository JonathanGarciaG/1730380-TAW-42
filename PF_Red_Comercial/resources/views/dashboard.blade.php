<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Red Comercial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <!--<link href="./main.css" rel="stylesheet"></head>-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
    <script src="https://kit.fontawesome.com/7f0f39d1db.js" crossorigin="anonymous"></script>
    </head>
<body>
    <div id="app" class="component">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <h3>Red Comercial</h3>
                
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="btn-group nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="nav-link-icon fa fa-edit"></i>
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>        
                    </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{ asset('images/avatars/1.jpg') }}" alt="">
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->tipo }}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>                

        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="index">
                                        <i class="fas fa-home"></i>
                                          Inicio
                                    </a>
                                </li>
                                @if(Auth::user()->tipo=="Super User")
                                
                                <li class="app-sidebar__heading">USUARIOS</li>
                                <li>
                                    <a href="users">
                                        <i class="fas fa-users"></i>
                                          Ver Usuarios
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">EMPRESAS</li>
                                <li>
                                    <a href="empresasv">
                                        <i class="fas fa-briefcase"></i>
                                          Ver Empresas
                                    </a>
                                    <a href="categoriasev">
                                        <i class="fas fa-list"></i>
                                          Ver Categorías de empresas
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">PRODUCTOS</li>
                                <li>
                                    <a href="sproductosv">
                                        <i class="fas fa-boxes"></i>
                                          Ver Productos
                                    </a>
                                </li>
                                
                                @else

                                <li class="app-sidebar__heading">PRODUCTOS</li>
                                <li>
                                    <a href="productosv">
                                        <i class="fas fa-boxes"></i>
                                          Ver Productos y Servicios
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">MICROSITIO</li>
                                <li>
                                    <a href="micrositiov">
                                        <i class="fas fa-boxes"></i>
                                          Ver Microsistio
                                    </a>
                                </li>

                                
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                @yield('contenido')

                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <!-- Se llama al js all que contiene todos los scripts del template -->
                <script src="{{ asset('js/all.js') }}"></script>
                <!-- Se llama al js app que contiene todos los componentes -->
                <script src="{{ asset('js/app.js') }}"></script>
        </div>
    </div>

</div>
</body>
</html>
