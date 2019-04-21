<!-- Preloader Start -->
<div id="preloader">
    <div class="colorlib-load"></div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header_area animated">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Menu Area Start -->
            <div class="col-12 col-lg-10">
                {{-- <div class="menu_area"> --}}
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- Logo -->
                        <a class="navbar-brand col-2 nav-item active" href="/"><img src="{{ url('bootstrap/img/logos/msa-logo.png') }}" alt="Me salva Ai" width="100%"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Menu Area -->
                        <div class="collapse navbar-collapse" id="ca-navbar">
                            <ul class="navbar-nav ml-auto" id="nav">
                                {{-- <li class="nav-item active"><a class="nav-link" href="#home">HOME</a></li> --}}
                                <li class="nav-item"><a class="nav-link" href="#about">SOBRE NÓS</a></li>
                                <li class="nav-item"><a class="nav-link" href="#como-funciona">COMO FUNCIONA</a></li>
                                <li class="nav-item"><a class="nav-link" href="#mimos">MIMOS</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="#cashback">CASHBAK</a></li> --}}
                                <li class="nav-item"><a class="nav-link" href="#financiamento">FINANCIAMENTO COLETIVO</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="#testimonials">FINANCIAMENTO</a></li> --}}
                                {{-- <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> --}}
                                {{-- <li class="nav-item"><a class="nav-link" href="#contact">CONTATO</a></li> --}}
                            </ul>
                            <div class="sing-up-button d-lg-none">
                                <a href="{{ url('ingresar') }}">ENTRAR</a>
                            </div>
                        </div>
                    </nav>
                {{-- </div> --}}
            </div>
            <!-- Signup btn -->
            <div class="col-12 col-lg-2">
                <div class="sing-up-button d-none d-lg-block">
                    <a href="{{ url('ingresar') }}">ENTRAR</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ***** Header Area End ***** -->
