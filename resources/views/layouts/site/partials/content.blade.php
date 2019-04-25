<!--========================== Home Section ============================-->
    <div class="clearfix"></div>
    <section id="home" style="padding-top: 80px;">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="mask flex-center" style="background: url({{ asset('site/img/msa/slides/slide-5.jpg') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1">
                                    <h4 style="padding-top: 30%;"><b style="color: #30bdff">Não</b> estuda porque tá sem grana? <b style="color: #B300A1">Me Salva Ai</b> é uma opção ideal pra <b style="color: #F52A2A">você</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="mask flex-center" style="background: url({{ asset('site/img/msa/slides/slide-6.jpg') }});">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 order-md-1 order-2">
                                    <h4 style="padding-top: 30%;"><b style="color: #1d2126">Não</b> estuda porque tá sem grana? <b style="color: #B300A1">Me Salva Ai</b> é uma opção ideal pra <b style="color: #F52A2A">você</b></h4>
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ===== Section para students and Donations === -->
<section class="students pt-5 pb-5" id="crie-sua-campanha">
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <h4 class="text-dark font-weight-bold text-center">PARA ESTUDANTES</h4>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-1.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Modelo de campanha</h6>
                        <p class="p-0 m-0">Crie seu projeto gratuitamente, defina sua meta em dinheiro e um prazo de ( 1 a 60 dias). leve o que arrecadar, independente da sua meta.</p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-2.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Mais fácil do que usar o facebook</h6>
                        <p class="p-0 m-0">Preencha nosso passo-a-passo online e lance seu projeto de crowdfunding em minutos!</p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-3.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Divulgue</h6>
                        <p class="p-0 m-0">Mobilize amigos, familiares, parentes e vizinhos. Divulgue seu projeto e compartilhes nas redes sociais e vu a lá só acompanhar as colaborações recebidas.</p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-4.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Repasse</h6>
                        <p class="p-0 m-0">Após a finalização do projeto, repassamos o valor R$ para a instituição de ensino semestralmente.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center pb-4">
                        <a href="{{ route('create.project') }}" title="" class="btn btn-primary btn-lg w-50">Criar campanha</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <h4 class="text-dark font-weight-bold text-center">PARA DOADORES</h4>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-5.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Ajude estudantes de diversas instituições de ensino.</h6>
                        <p class="p-0 m-0">Para cada contribuição, receba uma recompensa relacionada. Tem camisas, objetos personalizados, arte e muito mais! </p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-6.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Dia de fazer o bem</h6>
                        <p class="p-0 m-0">Você pessoa física ou jurídica, faça parte de um grupo seleto de pessoas que contribuem para o crescimento da educação.</p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-7.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Facilidades na sua contribuição</h6>
                        <p class="p-0 m-0">Patrocine um ou mais projetos com boleto ou cartão de crédito (podendo parcelar em até 6x)! </p>
                    </div>
                </div>
                <div class="row pb-4 align-items-center">
                    <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                        <img src="{{ asset('site/img/msa/icons/icon-7.png') }}" alt="" class="img-fluid rounded-circle" width="60%" >
                    </div>
                    <div class="col-8">
                        <h6 class="text-muted font-weight-bold mb-0">Facilidades na sua contribuição</h6>
                        <p class="p-0 m-0">Patrocine um ou mais projetos com boleto ou cartão de crédito (podendo parcelar em até 6x)! </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center pb-4">
                        <a href="#camping" title="" class="btn btn-primary btn-lg w-50">Doar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== Section campanha === -->
<section class="campanha pt-4 pb-4">
    <div class="container-fluid">
        <div class="row bg-campanha">
            <div class="col-md bg-campanha">
                <div class="row h-100">
                    <div class="d-flex justify-content-center align-items-center pt-4 pb-4">
                        <div class="col-md-10">
                            <h1 class="text-center font-weight-bold text-gray-dark">Crie sua campanha de <strong class="text-dark">GRADUAÇÃO</strong></h1>
                            <h4 class="font-weight-bold text-warning"><strong class="text-white">CONECTE</strong> pessoas ao seu <strong class="text-danger">PROPÓSITO</strong>.</h4>
                            <p class="text-justify text-white">Mobilize seus familiares, parentes e amigos através do Crowdfunding, define o valor da faculdade ou nº de semestre a serem financiados e vu a lá é só acompanhar as colaborações recebidas e sabe o melhor de tudo? leve o que arrecadar independente da sua meta.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md p-0 bg-campanha">
                <img src="{{ asset('site/img/msa/camping-1.webp') }}" alt="Campanha" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- ===== Section instructions === -->
<section class="instructions">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 p-0 bg-white">
                <img src="{{ asset('site/img/msa/camping-2.webp') }}" alt="Campanha" class="img-fluid">
            </div>
            <div class="col-md-7 bg-white">
                <div class="row h-100">
                    <div class="d-flex justify-content-center align-items-center pt-5 pb-5">
                        <div class="col-md-10">
                            <h2 class="text-right text-gray-dark font-weight-bold">Tudo que você faz é parte de sua história.</h2>
                            <h3 class="text-right text-danger font-weight-bold">Traga sua campanha criativo ao mundo.</h3>
                            <p class="text-right">Uma nova forma de financiar seus estudos e ainda, construir comunidade.</p>
                            <div class="row">
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/bank.png') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Não precisa devolver o dinheiro depois de formado.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/duties.png') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Receba contribuições dos seus amigos.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/school.webp') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Estude em qualquer Universidade dentro ou fora do Brasil.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/mortarboard.webp') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Faça qualquer curso seja de 2 ou seja de 6 anos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--========================== Campanhas Ativas ============================-->
@if ($campanhas->count() > 0)

<section class="campanhas-ativas" id="camping">
    <div class="container-fluid">
        <div class="row justify-content-between pb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <h3 class="font-weight-bold text-gray-dark">CAMPANHA ESTUDANTIS</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <a class="get-started-btn float-right" href="/" title="Ver campanhas">Ver todos</a>
            </div>
        </div>
        <div class="row">
            @foreach ($campanhas as $campanha)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 pb-3">
                    <div class="card h-100">
                        <a href="#" style="background-image: url({{ url('/miniatura/'. $campanha->file_path)  }});" class="img-min-campaign"></a>

                        <div class="card-body pb-1">
                            <div class="card-title">
                                <a href="{{ route('show.campanha', $campanha->slug) }}">{{ str_limit($campanha->title,'50') }}</a>
                            </div>
                            
                            <p class="card-text pt-0">{{ str_limit($campanha->abstract, '80') }}</p>
                            
                        </div>
                        <div class="align-items-end p-2">
                            <div class="row pt-2">
                                <div class="col">
                                    <span class="badge badge-pill badge-secondary mb-2 float-left">R$ {{ MyFunctions::formatandoForView($campanha->funds_received) }}</span>
                                    <span class="badge badge-pill badge-info mb-2 float-right">R$ {{ MyFunctions::formatandoForView($campanha->goal) }}</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {!! ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}%;" aria-valuenow="{!! ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}" aria-valuemin="0" aria-valuemax="100">{{ ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}%</div>
                            </div>
                            <p class="card-text pt-2">
                                <small class="text-muted float-left">{{ FormatTime::diasRestantes($campanha->end_date) }}</small>
                            </p>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <a href="{{ route('show.campanha', $campanha->slug) }}" title="Doar"  class="get-started-btn">Doar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin: 20px; margin-top: 50px;" width="100%" align="center">
            <a href="{{ route('campanhas') }}" title="todas-campanhas"  class="get-started-btn">Todas as campanhas</a>
        </div>
    </div>
</section>
@endif

<!--========================== Section items rodape ============================-->
<section id="items-rodape" class="items-rodape-bg">
    <div class="container">
        <div class="row ljustify-content-md-center">
            <div class="col-md">
                    <h5 class="text-white">mesalvaai.com</h5>
                    <p>© 2018 todos os direitos reservados. <br>
CNPJ: 30.423.752/0001-26 - Capoeiruçu, Edifício Sabiá 05 ,Cachoeira/BA -  1º Andar.</p>
            </div>
            <div class="col-md">
                <h3>Central de Ajuda</h3>
                <p><i class="fas fa-envelope-square" style="font-size: 22px;"></i> msa@mesalvaai.com</p>
                <p><i class="fas fa-phone" style="font-size: 22px;"></i> (75) 99157-0597</p>
            </div>
            <div class="col-md">
                <h5 class="text-white">Saiba mais</h5>
                <div class="box" data-aos="fade-right">
                  <ul>
                        <li><a href="#" title="">Sobre nós</a></li>
                        <li><a href="#" title="">Como criar uma campanha</a></li>
                        <li><a href="#" title="">Termos</a></li>
                        <li><a href="#" title="">Para Instituições</a></li>
                        <li><a href="#" title="">Bolsas de estudos</a></li>

                    </ul>

                </div>
            </div>
            <div class="col-md-12 pt-4 text-center">
                <p class="text-white">Transforme suas experiências em realidade =)</p>
            </div>
        </div>
    </div>
</section>

<!--========================== Contact Section ============================-->
{{-- <section id="sub-footer" class="sub-footer-bg">
    <div class="container-fluid">
        <div class="row" data-aos="fade-up">
            <div class="col-3" align="center">
                <div class="social-links">
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
                    <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-9">
                <nav class="footer-links pt-2 pt-lg-2">
                    <a href="#" class="scrollto"><i class="fas fa-envelope"></i> msa@mesalvaai.com</a>&nbsp;&nbsp;
                    <a href="#" class="scrollto"><i class="fas fa-phone"></i> +55 (75) 99950-5469</a>&nbsp;&nbsp;
                    <a href="#" class="scrollto"><i class="fas fa-map-marker-alt"></i> Rodovia BR 101, km 197 - Capoeiruçu, Cachoeira - BA, 44300-000</a>
                </nav>
            </div>
        </div>
    </div>
</section> --}}



