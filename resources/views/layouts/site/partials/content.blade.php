<!--==========================
    Home Section
    ============================-->
    <div class="clearfix">
        
    </div>
    <section id="home" style="padding-top: 80px;">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="mask flex-center" style="background: url({{ asset('site/img/msa/slides/slide-5.jpg') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                    {{-- <h4>Present your <br>
                                    awesome product</h4>
                                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                    necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                    <a href="#">BUY NOW</a>  --}}
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1">
                                    {{-- <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg" class="img-fluid mx-auto" alt="slide"> --}}
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
                                    {{-- <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg" class="img-fluid mx-auto" alt="slide"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <div class="mask flex-center" style="background: url('https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg');">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                    <h4>Present your <br>
                                    awesome product</h4>
                                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                    necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                    <a href="#">BUY NOW</a> 
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg" class="img-fluid mx-auto" alt="slide">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> 
                <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                <span class="sr-only">Previous</span> 
            </a> 
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> 
                <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                <span class="sr-only">Next</span> 
            </a>  --}}
        </div>

    </section>
    <!-- #intro -->

<!-- ===== Section para students and Donations === -->

<section class="students pt-5 pb-5">
    <div class="container-fluid">
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
                    <div class="col-12 text-center">
                        <a href="#" title="" class="btn btn-primary btn-lg w-50">Criar campanha</a>
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
                    <div class="col-12 text-center">
                        <a href="#" title="" class="btn btn-primary btn-lg w-50">Doar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== Section campanha === -->
<section class="campanha">
    <div class="container-fluid">
        <div class="row bg-campanha">
            <div class="col-md bg-campanha">
                <div class="row h-100">
                    <div class="d-flex justify-content-center align-items-center">
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
        <div class="row bg-white">
            <div class="col-md-5 p-0 bg-white">
                <img src="{{ asset('site/img/msa/camping-2.webp') }}" alt="Campanha" class="img-fluid">
            </div>
            <div class="col-md-7 bg-white">
                <div class="row h-100">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-10">
                            <h2 class="text-right text-gray-dark">Tudo que você faz é parte de sua história.</h2>
                            <h3 class="text-right text-danger">Traga sua campanha criativo ao mundo.</h3>
                            <p class="text-right">Uma nova forma de financiar seus estudos e ainda, construir comunidade.</p>
                            <div class="row">
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/icon-1.png') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Não precisa devolver o dinheiro depois de formado.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/icon-2.png') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Receba contribuições dos seus amigos.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/icon-3.png') }}" alt="1" class="img-fluid pb-3" width="50%">
                                    <p class="text-muted text-b p-0 m-0">Estude em qualquer Universidade dentro ou fora do Brasil.</p>
                                </div>
                                <div class="col-md text-center">
                                    <img src="{{ asset('site/img/msa/icons/icon-4.png') }}" alt="1" class="img-fluid pb-3" width="50%">
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

<main id="main">
    <!--==========================
      Buscar Bolsa Section
      ============================-->
      <section id="section-tree" class="section-tree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="box" data-aos="fade-right">
                        {{-- <h3>Free</h3> --}}
                        {{-- <h4><sup></sup>01<span></span></h4> --}}
                        <div class="pulse-item"><span class="mask"><i class="fas fa-address-card" ></i></span></div>
                        <h3>Bolsa de estudo</h3>
                        <p>Faça uma busca para encontrar sua faculdade ou curso, pelo preço que você pode pagar</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box featured" data-aos="fade-up">
                        {{-- <h3>Business</h3> --}}
                        {{-- <h4><sup></sup>02<span></span></h4> --}}
                        <div class="pulse-item"><span class="mask"><i class="fab fa-readme"></i></span></div>
                        <h3>Pré-matricula</h3>
                        <p>Encontrou a melhor opção? Inscreva-se e garanta sua bolsa na hora através do pagamento. Depois basta fazer o processo seletivo da faculdade, apresente o comprovante de pré-matricula e matricule-se com a bolsa até o final do curso</p>
                        
                    </div>
                    <div class="text-center">
                        <a href="/bolsas" class="get-started-btn">Buscar bolsa</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box" data-aos="fade-left">
                        {{-- <h3>Developer</h3> --}}
                        {{-- <h4><sup></sup>03<span></span></h4> --}}
                        <div class="pulse-item"><span class="mask"><i class="fab fa-reddit"></i></span></div>
                        <h3>Mimos</h3>
                        <p>Depois de completar todas as etapas está na hora de se divertir com os Mimos do Me Salva Aí</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #Buscar Bolsa -->

    <!--==========================
      Section Four
      ============================-->
      <section id="section-four" class="section-four-bg">
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10" data-aos="fade-right">
                    <figure class="img-effect">
                        <img src="site/img/msa/sec4-6.jpg" alt="Me salva Ai" />
                    </figure>
                </div>

                <div class="col-lg-32content" data-aos="fade-left">
                </div>
            </div>


            <div class="description">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <h2>Pontuar é fácil. Experimentar é melhor.</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                       <p>Acabou o sufoco de conversões complexas, de pontos que expiram toda hora. Agora, você pode acumular pontos em tempo real para usar de um jeito fácil com o que você realmente quer. No Me Salva Aí, você só tem a ganhar.</p> 
                   </div>
               </div>
           </div>
       </div>
   </section><!-- #section-four -->

    <!--==========================
      Section Mimos
      ============================-->
      <section id="mimos" class="mimos-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mimos-img text-center align-content-lg-end">
                        <img src="{{ asset('site/img/msa/celular.png') }}" alt="MSA" width="60%">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-8 text-center">
                        <h2>Os mimos agora são para todo mundo.</h2>
                        <p>Conheça os mimos do Me Salva Aí</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Section Conhece o Crowdfounding
      ============================-->
      <section id="crowdfounding" class="crowdfounding-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h2>Ei, já conhece o financiamento coletivo do Me Salva Aí?</h2>
                        <p>Uma nova forma de financiar <br> seu estudo e ainda construir <br> comunidade</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('financing.index') }}" class="get-started-btn">Criar Campanha</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="crowdfounding-img text-left align-content-lg-end">
                        <img src="{{ asset('site/img/msa/crowf-3.jpg') }}" alt="MSA" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Section Conhece o Crowdfounding
      ============================-->
      <section id="juros">
        <div class="container juros-bg">
            <div class="row ljustify-content-md-center">
                <div class="col-lg-6 offset-lg-3">
                    <h3 class="text-center">Chega de pagar juros altos, não faz sentido vivermos como nossos pais, por que usaríamos o mesmo métodos de financiamentos que eles?</h3>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Campanhas Ativas
      ============================-->
      <section class="campanhas-ativas pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                @foreach ($campanhas as $campanha)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <a href="#" style="background-image: url({{ url('/miniatura/'. $campanha->file_path)  }});" class="img-min-campaign"></a>
                        <div class="card-body">
                            <div style="height: 50px;">
                                <a href="{{ route('show.campanha', $campanha->slug) }}"><h5 class="card-title">{{ str_limit($campanha->title,'50') }}</h5></a>
                            </div>
                            <div style="height: 80px;">
                                <p class="card-text">{{ str_limit($campanha->abstract, '80') }}</p>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="badge badge-pill badge-secondary mb-2 float-left">R$ {{ MyFunctions::formatandoForView($campanha->funds_received) }}</span>
                                    <span class="badge badge-pill badge-info mb-2 float-right">R$ {{ MyFunctions::formatandoForView($campanha->goal) }}</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}</div>
                            </div>
                            {{-- <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}</div>
                            </div> --}}
                            <p class="card-text pt-2">
                                <small class="text-muted float-left">{{ FormatTime::diasRestantes($campanha->start_date, $campanha->end_date) }} Dias restantes</small>
                            </p>
                            <div style="margin: 20px; margin-top: 50px;" width="100%" align="center">
                                <a href="{{ route('show.campanha', $campanha->slug) }}" title="Doar"  class="get-started-btn">Doar</a>
                            </div>
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

    <!--==========================
      Section Como é simples
      ============================-->
      <section id="section-five" class="section-five-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8 offset-lg-2">
                    <div class="child-bg">
                        <h2 class="text-center">Viu como é simples</h2>
                        <p class="text-center">Basta escolher seu curso, instituição e pagar a primeira mensalidade e vó alá, divirta-se até o final do curso</p>
                        <div class="text-center">
                            <a href="/bolsas" class="get-started-btn">Encontre sua bolsa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--==========================
      Section relacionamento
      ============================-->
      <section id="relacionamento" class="relacionamento-bg">
        <div class="container">
            <div class="row ljustify-content-md-center">
                <div class="col">
                    <i class="fas fa-phone" data-aos="fade-left"></i>
                    <p data-aos="fade-left">
                        (33) 99123-4351
                        Seg - Sex 8h-22h
                        Sáb 9h-13h
                    </p>
                </div>
                <div class="col">
                    <i class="fab fa-rocketchat" data-aos="fade-left"></i>
                    <p data-aos="fade-left">Chat ao vivo
                    Fale com um atendente</p>
                </div>
                <div class="col">
                    <i class="fas fa-envelope" data-aos="fade-left" data-aos-delay="200"></i>
                    <p data-aos="fade-left" data-aos-delay="200">Mande um Email
                    Respondemos rapidinho</p>
                </div>
                <div class="col">
                    <i class="fas fa-question-circle" data-aos="fade-left" data-aos-delay="400"></i>
                    <p data-aos="fade-left" data-aos-delay="400">Central de Ajuda
                        Encontre todas as respostas 
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Section items rodape
      ============================-->
      <section id="items-rodape" class="items-rodape-bg">
        <div class="container">
            <div class="row ljustify-content-md-center">
                <div class="col">
                    <h3>Encontre sua bolsa</h3>
                    <div class="box" data-aos="fade-right">
                      <ul>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Busque por Curso</a></li>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Lista de Faculdades</a></li>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Lista de Cursos</a></li>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Pós-Graduação</a></li>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Cursos Livres</a></li>
                        <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Cursos EAD</a></li>
                    </ul>

                </div>
            </div>
            <div class="col">
                <h3>Central de Ajuda</h3>
                <div class="box" data-aos="fade-right">
                  <ul>
                    <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Passo a Passo</a></li>
                    <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Perguntas Frequentes</a></li>
                    <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Termos e Condições</a></li>
                    <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Política de Privacidade</a></li>
                    <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Busque por Curso</a></li>
                </ul>

            </div>
        </div>
        <div class="col">
            <h3>Institucional</h3>
            <div class="box" data-aos="fade-right">
              <ul>
                <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Trabalhe conosco</a></li>
                <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Para faculdades</a></li>
                <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Seja um parceiro</a></li>
                <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Imprensa</a></li>
                <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Captação de Alunos</a></li>
            </ul>

        </div>
    </div>
    <div class="col">
        <h3>Dicas Me Salva Aí</h3>
        <div class="box" data-aos="fade-right">
          <ul>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Bolsas Ensino Básico</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Serviços Parceiros</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Mimos</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Financiamento coletivo</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Ciclo de mentoria</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">Cursos Gratuitos</a></li>
            <li><i class="ion-android-checkmark-circle"></i><a href="#" title="">App Quero Bolsa</a></li>

        </ul>

    </div>
</div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 offset-3">
        <div class="line-redes"></div>
        <div class="redes-sociais">
            <ul class="text-center">
                <li><a href="#" title=""><i class="fab fa-facebook"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-google-plus"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-youtube"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-pinterest"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
</div>
</section>


    <!--==========================
      Quem Somos Section
      ============================-->
      {{-- <section id="quem-somos">
        <div class="container">
            <div class="quem-somos-bg">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="qs-text">
                            <h2 class="text-uppercase">Quem Somos</h2>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div data-aos="fade-right">
                            <div class="qs-child-bg">
                                <div class="p-5">
                                    <p>​
                                        No Brasil, pagamos mensalidades muito altas e nem sempre identificamos com a instituição. Nós sabemos que tecnologia e design podem resolver esse problema.
                                    ​</p>
                                    <p>Por isso, criamos em 2018 uma plataforma  onde unimos Marketplace e o    Crowdfunding para redefinir a relação das pessoas com as instituições de ensino, através de uma experiência mais eficiente e transparente.</p>
                                    <p>
                                    Nosso objetivo é acabar com as vagas ociosas que existe dentro das instituições e levar mensalidades acessíveis para jovens estudantes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- #quem-somos -->

    <!--==========================
      Call To Action Section
      ============================-->
      {{-- <section id="call-to-action">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 text-center text-lg-left">
                <h3 class="cta-title">Call To Action</h3>
                <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="#">Call To Action</a>
            </div>
        </div>

    </div>
</section> --}}
<!-- #call-to-action -->

    <!--==========================
      Contact Section
      ============================-->
      <section id="sub-footer" class="sub-footer-bg">
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
    </section><!-- #contact -->

</main>

