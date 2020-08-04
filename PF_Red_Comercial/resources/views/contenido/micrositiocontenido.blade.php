<!doctype html>
<html lang="en">
<?php

if (isset($_GET["id"])) {
    $id_empresa=$_GET["id"];
}else{
    $id_empresa=0;
}

?>
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
                <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    @if(Auth::check())
                    <ul class="header-menu nav">
                        <li class="btn-group nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="nav-link-icon fa fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <li class="btn-group nav-item">
                            <a class="dropdown-item" href="{{ url('index') }}">
                                <i class="nav-link-icon fa fa-cog"></i>
                                {{ __('Admin') }}
                            </a>
                        </li>

                    </ul> 
                    @else
                    <ul class="header-menu nav">
                        <li class="btn-group nav-item">
                            <a class="dropdown-item" href="{{ url('index') }}">
                                <i class="nav-link-icon fa fa-home"></i>
                                {{ __('Volver') }}
                            </a>
                        </li>
                    </ul>
                    @endif

                    </div>
                    @if(Auth::check())
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
                    @endif
            </div>
        </div>                

        <div class="app-main">
            <div class="app-main__inner">


                
                <micrositio-carousel-component :id_empresa="{{ $id_empresa }}"></micrositio-carousel-component>

                <center><h2>Productos</h2></center>
                <hr>

                <micrositio-productos-component :id_empresa="{{ $id_empresa }}"></micrositio-productos-component>

            </div>
                

                <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
                <!-- Se llama al js all que contiene todos los scripts del template -->
                <script src="{{ asset('js/all.js') }}"></script>
                <!-- Se llama al js app que contiene todos los componentes -->
                <script src="{{ asset('js/app.js') }}"></script>

        </div>
    </div>

</div>
</body>
</html>
