<header class="header-fixed fixed-top bg-white">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-12 col-md- col-lg-4">
                <div class="d-flex h-100 align-items-center text-center">
                    <h1 class="m-0"><a href="/" class="scrollto"><strong>Me Salva Aí</strong></a></h1>
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <a class="navbar-brand d-none d-sm-block" href="{{ url('/') }}">
                        <h1 class="text-logo m-0"><a href="/" class="scrollto">Me Salva Aí</a></h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <b class="pr-5 text-phone"><i class="fab fa-whatsapp" style="font-size: 16px; color: green;"> </i> (75)99157-0597</b>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav nav-menu">
                            <li class="nav-item"><a class="nav-link" href="/#crie-sua-campanha">Crie sua campanha</a></li> 
                            <li class="nav-item"><a class="nav-link" href="{{route('financing.index')}}">Encontre sua bolsa</a></li>
                            @auth
                                <li class="nav-item"><a class="nav-link" href="{{route('financiamento.index')}}">Minhas campanhas</a></li>
                            @endauth
                        </ul>
                    </div>
            </nav>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 pl-0 pr-0 bg-login d-flex align-items-center ">
                @guest
                    <a class="btn-login" href="{{ url('/financiamento/criar-campanha') }}">{{ __('LOGIN') }}</a>
                    {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                @else
                    <a class="btn-login text-uppercase" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{-- {{ __('Logout') }} --}}
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                @endguest
            </div>
        </div>
        
    </div>
</header>

<!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>-->