<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto"><strong>Me Salva Ai</strong></a></h1>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#home">Home</a></li>
                <li><a href="#about">Como funciona</a></li>
                <li><a href="#features">Mimos</a></li>
                <li><a href="#pricing">Financiamento coletivo</a></li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="menu-has-children"><a href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                        <ul>
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
                
            </ul>
        </nav>
    </div>
</header>