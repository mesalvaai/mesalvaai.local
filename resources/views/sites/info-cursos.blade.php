@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('styles')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="{{ asset('site/lib/materialize/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="{{ asset('site/lib/materialize/css/style1.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href=" {{ asset('site/lib/materialize/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<!--<link rel="stylesheet" type="text/css" href="{{ asset('site/lib/@fortawesome/fontawesome-free/css/all.css') }}">-->

@endsection

@section('content')

<!--Aqui  crias o layout de informaçao de cursos-->
<body class="rbgacinza">
       <!--<nav  class="white menuFixo" role="navigation" >
            <div class="nav-wrapper container" ><span style="color:#5643B0;"><span style="font-size:30px;"><span style="font-family:arial black,arial-w01-black,arial-w02-black,arial-w10 black,sans-serif;"><span style="font-weight:bold;"><span style="letter-spacing:0.3em;">
                                    <a id="logo-container" href="#" class="brand-logo teal-text">Me Salva ai</a></span></span></span></span></span>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>-->
       



        <div class="parallax-container1 valign-wrapper">

            <div class="section no-pad-bot">
                <div class="container1">
                    <div class="row center">

                        <table>
                            <tr>
                                <td><img src="site/lib/materialize/img/fadba-logo.png" alt="" height="150" width="250"/></td>
                                <td><h5 class="header col s12 light white-text">Administração na Faculdade Adventista da Bahia</h5 ></td>
                            </tr>
                        </table>    
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="site/lib/materialize/img/conteiner1.png" alt="Unsplashed background img 1" style="transform: translate3d(-50%, 93.0302px, 0px); opacity: 1;"></div>
        </div>


        <div class="container1 rbgacinza">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row justify-content-md-center">
                    <div class="col s12 m4 white z-depth-3" style="height: 253px">
                        <div class="icon-block white">

                            <p>Nível: Graduação (Bacharelado)<br>

                                Duração: 8 Semestres<br>

                                Campus: FADBA - Cachoeira BA <br>

                                Modalidade: Precensial <br>

                                Turno: oturno<br> </p>


                        </div>
                    </div>

                    <div class="col s12 m4 z-depth-1" style="height: 253px; background-color: rgba(232, 230, 230, 1)">
                        <div class="icon-block " style="background-color: rgba(232, 230, 230, 1)">

                            <h5 class="center">O que eu ganho</h5>
                            <p class="center">Matrícula gratis</p>
                            <p class="center">Economia de R$ 11.769,60</p>
                            <p class="center">Desconto até o final do curso</p>
                        </div>
                    </div>

                    <div class="col s12 m4 white z-depth-3" style="height: 253px">
                        <div class="center " style=" margin-top: 15px">
                            <a href="#" id="download-button" class="btn-large waves-effect waves-light lighten-1" style="color:#FFFFFF">Bolsa de estudo</a>
                        </div>
                        <div class="icon-block white">

                            <p class="center">Bolsa de 45%<br>

                                de R$ 597,00<br>

                                por R$ 328,35<br></p>
                        </div>
                    </div>
                </div>









                <div class="row center blue-grey-text">
                    <h5> Gostou da bolsa? É muito simples conseguir a sua!</h5>
                </div>










                <div class="row justify-content-md-center">
                    <div class="col s12 m4 transparent">
                        <div class="icon-block transparent" >
                            <h5 class="center">01</h5>
                            <h6><strong>Compre o Cupom Neora por <br/>R$ 125,80 (taxa única)</strong></h6>

                            <p>Você não paga mais nada para a Neora depois do curso. Ah, se não fizer a matrícula, devolvemos 100% do seu dinheiro.</p>

                        </div>
                    </div>

                    <div class="col s12 m4 transparent">
                        <div class="icon-block transparent">

                            <h5 class="center">02</h5>
                            <p> <strong>Inscrever-se e prestar o vestibular </strong></p>

                        </div>
                    </div>

                    <div class="col s12 m4 transparent">
                        <div class="icon-block transparent">
                            <h5 class="center">03</h5>

                            <p class="light"><strong> Entregar o Cupom Neora no dia da matrícula </strong></p>
                        </div>
                    </div>
                </div>



            </div>
        </div>


        <div class="group parallax-container1 valign-wrapper sombra" >
            <div id="DivA" class="black-text" style="width: 40%; height: 380px">
                <div class="center-align">
                    <h5>Sobre o Campus</h5>

                    <p>Rodovia BR 101, km 197 - <br> Capoeiruçu, Cachoeira - BA,<br> 44300-000</p>

                    <p>Telefone: (75) 3425-8000</p>

                    <p>http://www.adventista.edu.br</p>
                </div>
            </div>
            <div id="DivLateral" style="width: 60%; height: 380px" tabindex="0" title="Google Maps" aria-label="Google Maps" style="left: 356px; width: 808px; position: absolute; margin-left: calc((100% - 980px) * 0.5); top: 926px; height: 400px;">
                <iframe width="100%" height="100%" frameborder="0" scrolling="no" title="Google Maps" aria-label="Google Maps" src="https://static.parastorage.com/services/santa/1.4052.21/static/external/googleMap.html?language=pt-BR"></iframe>
            </div>
        </div>

        <div>
            <div class="container1">
                <div class="section">

                    <div class="row">
                        <div class="col s12 center">
                            <h3><i class="mdi-content-send brown-text"></i></h3>
                            <h4>Sobre Administração</h4>
                            <p class="left-align light"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="parallax-container1 valign-wrapper white">
            <div class="section no-pad-bot">
                <div class="container1">
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                </div>
            </div>
            <div class="parallax"></div>
        </div>


        <div class="group parallax-container1 valign-wrapper z-depth-1 sombra" >


        </div>



        <footer class="page-footer teal">
            <div class="container1">
                <div class="row">
                    <div class="col l6 s12">
                        
                        
                    </div>
                    <div class="col l3 s12">
                        
                    </div>
                    <div class="col l3 s12">
                       
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container1">
                     <a class="brown-text text-lighten-3" href="#"></a>
                </div>
            </div>
        </footer>
</body>
@endsection

@section('scripts')
<!--aqui chamas os javascrips que usas de materialize
@endsection-->