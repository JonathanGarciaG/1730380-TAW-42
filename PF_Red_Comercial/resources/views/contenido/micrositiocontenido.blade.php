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
                <div class="app-header__content">
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
            <div class="app-main__inner">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title center">Nombre de negocio</h5>
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">

                    <div class="col-md-4">
                        <div class="main-card mb-3 card"><img width="100%" src="waifu2.jpg" alt="Card image cap" class="card-img-top">
                            <div class="card-body"><h5 class="card-title">Card title</h5><h6 class="card-subtitle">Card subtitle</h6>Some quick example text to build on the card title and make up the bulk of the card's content.<tr>    
                            </div>
                            <div class="card-footer"><button class="btn btn-secondary">Button</button></div>
                        </div>
                    </div>

                </div>

            </div>
                

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
