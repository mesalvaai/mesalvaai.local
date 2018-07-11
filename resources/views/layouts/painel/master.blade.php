<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="robots" content="all,follow">

    <!-- Google fonts - Roboto -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('backend/css/fontastic.css') }}">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('backend/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{ asset('backend/img/avatar-1.jpg') }}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">{{ Auth::user()->name }}</h2><span>Web Developer</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>

        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <li><a href="{{ url('painel') }}"> <i class="icon-home"></i>Home </a></li>
                <li>
                    <a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>Usuarios</a>
                    <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                        @can('users.index')
                        <li><a href="{{ url('/users') }}">Usuarios</a></li>
                        @endcan
                        
                        @can('roles.index')
                        <li><a href="{{ url('/roles') }}">Roles</a></li>
                        @endcan

                        @can('permissions.index')
                        <li><a href="{{ url('/permissions') }}">Permisos</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Localização</a>
                    <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                        @can('contries.index')
                        <li><a href="{{ url('/countries') }}">Paises</a></li>
                        @endcan

                        @can('states.index')
                        <li><a href="{{ url('/states') }}">Estados</a></li>
                        @endcan
                        
                        @can('cities.index')
                        <li><a href="{{ url('/cities') }}">Cidades</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i>Financiamento</a>
                    <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                        @can('categories.index')
                        <li><a href="{{ url('/students') }}">Estudiantes</a></li>
                        @endcan

                        @can('categories.index')
                        <li><a href="{{ url('/categories') }}">Categorias</a></li>
                        @endcan
                        
                        @can('campaigns.index')
                        <li><a href="{{ url('/campaigns') }}">Campanhas</a></li>
                        @endcan

                        @can('donations.index')
                        <li><a href="{{ url('/donations') }}">Donações</a></li>
                        @endcan
                    </ul>
                </li>
                {{-- <li><a href="{{ url('formss') }}"> <i class="icon-form"></i>Forms </a></li>
                <li><a href="{{ url('chartss') }}"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                <li><a href="{{ url('tabless') }}"> <i class="icon-grid"></i>Tables </a></li>
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a href="{{ url('ingresarr') }}"> <i class="icon-interface-windows"></i>Login page</a></li>
                <li><a href="{{ url('cadastrarr') }}"> <i class="icon-interface-windows"></i>Register page</a></li>
                <li> 
                    <a href="#"> <i class="icon-mail"></i>Demo
                        <div class="badge badge-warning">6 New</div>
                    </a>
                </li> --}}
            </ul>
        </div>
        {{-- <div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled"> 
                <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                <li> <a href="#"> <i class="icon-flask"> </i>Demo
                    <div class="badge badge-info">Special</div></a></li>
                <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
            </ul>
        </div> --}}
      </div>
    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                      <div class="navbar-header"><a id="toggle-btn" href="{{ url('/') }}" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{ url('/') }}" class="navbar-brand">
                          <div class="brand-text d-none d-md-inline-block"><span>SYSTEM </span><strong class="text-primary">{{ config('app.name', 'ME SALVA AI') }}</strong></div></a></div>
                      <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Notifications dropdown-->
                        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                          <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                <div class="notification d-flex justify-content-between">
                                  <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                                  <div class="notification-time"><small>4 minutes ago</small></div>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                <div class="notification d-flex justify-content-between">
                                  <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                  <div class="notification-time"><small>4 minutes ago</small></div>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                <div class="notification d-flex justify-content-between">
                                  <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                                  <div class="notification-time"><small>4 minutes ago</small></div>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                <div class="notification d-flex justify-content-between">
                                  <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                  <div class="notification-time"><small>10 minutes ago</small></div>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                          </ul>
                        </li>
                        <!-- Messages dropdown-->
                        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                          <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                <div class="msg-profile"> <img src="{{ asset('backend/img/avatar-1.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                <div class="msg-body">
                                  <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                <div class="msg-profile"> <img src="{{ asset('backend/img/avatar-2.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                <div class="msg-body">
                                  <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                <div class="msg-profile"> <img src="{{ asset('backend/img/avatar-3.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                <div class="msg-body">
                                  <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages</strong></a></li>
                          </ul>
                        </li>
                        <!-- Languages dropdown    -->
                        <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="{{ asset('backend/img/flags/16/GB.png') }}" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                          <ul aria-labelledby="languages" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('backend/img/flags/16/DE.png') }}" alt="English" class="mr-2"><span>German</span></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('backend/img/flags/16/FR.png') }}" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                          </ul>
                        </li>
                        <!-- Log out-->
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <i class="fa fa-sign-out"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            {{-- <li class="nav-item"><a href="{{ route('site') }}" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li> --}}
                      </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Forms</li> --}}
                    <li>
                      {{-- <i class="fa fa-home"></i> --}}
                      <a href="{{url('painel')}}">Home</a>
                      {{-- <i class="fa fa-angle-right"></i> --}}
                    </li>
                    @for($i = 0; $i <= count(Request::segments()); $i++)
                        <li class="breadcrumb-item">
                          <a href="">{{Request::segment($i)}}</a>
                          @if($i < count(Request::segments()) & $i > 0)
                            {{-- {!!'<i class="fa fa-angle-right"></i>'!!} --}}
                          @endif
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        
        <!--content-->
        @yield('content')

        <footer class="main-footer">
            <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
            </div>
        </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/charts-home.js') }}"></script> --}}
    <!-- Main File-->
    <script src="{{ asset('backend/js/front.js') }}"></script>

    @yield('scripts')

  </body>
</html>