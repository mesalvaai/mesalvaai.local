<header class="header-fixed fixed-top bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 d-flex align-items-center">
                <h1 class="m-0"><a href="/" class="scrollto"><strong>Me Salva Aí</strong></a></h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-center justify-content-end">
                <nav id="nav-menu-container"> 
                    <ul class="nav-menu">
                        <li><a href="/#call-sec-two">CRIAR SUA CAMPANHA</a></li> 
                        <li><a href="{{ url('mimos') }}">ENCONTRE SUA BOLSA</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 pl-0 pr-0 bg-login d-flex align-items-center ">
                @guest
                    <a class="btn-login" href="{{ url('/financiamento/criar-campanha') }}">{{ __('LOGIN') }}</a>
                    {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                @else
                    <li class="menu-has-children"><a href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                        <ul>
                            <li class="menu-has-children"><a href="#" title="Criar Campanha">Perfil</a></li>
                            <li class="menu-has-children"><a href="{{ route('financiamento.index') }}" title="Criar Campanha">Campanhas</a></li>
                            <li class="menu-has-children"><a href="{{ route('create.camping') }}" title="Criar Campanha">Criar Campanhas</a></li>
                            <li class="menu-has-children"><a href="{{ route('list.rewards') }}" title="Criar Recompensas">Recompensas</a></li>
                            <li class="menu-has-children"><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul> 
                    </li>
                @endguest
            </div>
        </div>
        
    </div>
</header>

<!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>-->