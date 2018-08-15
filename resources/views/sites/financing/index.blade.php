@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('styles')
	<style>
		/*.exemplo-row-flex-cols .row{
            min-height: 10rem;
            background-color: rgba(255,0,0,.1);
        }
        .exemplo-row .row>.col, .exemplo-row .row>[class^=col-]{
            background-color: rgba(86,61,124,.15);
            border: 1px solid rgba(86,61,124,.2);
            padding-top: .75rem;
            padding-bottom: .75rem;
        }*/
      
        .btncomeçar{
        	border-radius: 25px;
        	width: 200px; 
        	height: 50px; 
        	padding-top: 13px;

        }
	</style>
@endsection

@section('content')
	<section id="financing" class="financing">
		<div class="box-title">
			<div class="container text-center">
				<h1 class="text-white">O fim da <br> complexidade</h1>
				<h3 class="text-white">Traga seu projeto criativo ao mundo</h3>

				<div class="row">
					<div class="col-md-6 offset-3">
						<div class="content-img">
							<img src="{{ asset('site/img/msa/fc-phone-3.png') }}" alt="Financiamento Colectivo" width="25%">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="financing-sec-two" class="financing-sec-two">
		<div class="container">
			<div class="row" data-aos="fade-up">
				<div class="col text-center">
					<h3>Modelo de campanha</h3>
					<p>Escolha o modelo de campanha, defina sua meta financeira e um prazo de (1 a 60 dias). Nós fazemos a primeira contribuição para sua campanha! Campanhas "Flexíveis" (leve o que arrecadar, independente da sua meta)!</p>
				</div>
				<div class="col text-center">
					<h3>Mais fácil do que usar o facebook</h3>
					<p>Preencha nosso passo-a-passo online e lance sua campanha de crowdfunding em minutos! </p>
				</div>
				<div class="col text-center">
					<h3>Acompanhe</h3>
					<p>Divulgue sua campanha e compartilhes nas redes sociais e acompanhe as colaborações recebidas.</p>
				</div>
				<div class="col text-center">
					<h3>A gente só ganha se você ganhar</h3>
					<p>Não cobramos pela sua postagem e ainda somos a única plataforma que passamos 50% do valor mesmo que a campanha não esteja finalizadas.</p>
				</div>
			</div>
			<div class="text-center">
				<a href="{{ url('/financiamento/criar-campanha') }}" title="Comença projetos" class="btn-msa btncomeçar">Começar projetos</a>
				<h4 class="pt-5 text-msa font-weight-bold">A tecnologia a seu favor.</h4>
			</div>
		</div>
	</section>

	<section id="financing-sec-tree" class="financing-sec-tree">
		<div class="box-title">
			<div class="container">
				<div class="row align-self-md-auto">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<h1 class="text-white text-right">Financiamento <br>coletivo para <br> graduação e ensino <br> básico</h1>
						<div class="w-100 text-right">
							<p class="text-white">Coletivismo é uma excelente maneira de <br> financiar seus estudos em até 100% <br> e ainda construir comunidade.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="financing-camping" class="financing-camping">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h1 class="text-center text-msa font-weight-bold">Que tal criar sua campanha para fazer aquele intercâmbio com os amigos.</h1>
					<div class="pt-2 w-50 mr-0 m-auto">
						<p>Quer ter mais experiência no currículo? No Me Salva Aí você tem a oportunidade de fazer um intercâmbio (sozinho) ou com (amigos) em uma só campanha!</p>
					</div>
					<div class="box-img-left">
						<img src="{{ asset('site/img/msa/financiamento-3.jpg') }}" alt="Financiamento Colectivo" class="w-75">
					</div>
				</div>
				<div class="col-6">
					<div class="box-img d-none d-md-block">
						<img src="{{ asset('site/img/msa/celular.png') }}" alt="MSA" class="w-50">
					</div>
					<div class="box-camping-bg"></div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="box-two">
				<div class="row">
					<div class="col-3">
						<div class="fc-img">
							<img src="{{ asset('site/img/msa/fc-cel-msa.png') }}" alt="Financiamento Colectivo" class="w-75">
						</div>
					</div>
					<div class="col-9 fc-bg">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="text-center text-white fc-two-text float-right">
									<h3>Mesadinha do me salva Aí</h3>
									<p>Acabou o sofoco com o financiamento contínuo, e para estudantes
									que já tenham bolsas de estudos, mas precisam de uma ajudinha para se manter enquanto estudam.
									enquanto estuda</p>
								</div>
						
							</div>
							<div class="col-xs-12 col-md-6 ">
								<div class="fc-img-two justify-content-end">
									<img src="{{ asset('site/img/msa/financiamento-4.jpg') }}" alt="Ajuda" class="mx-auto float-right w-100">
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="financing-contribution">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-3">
					<div class="row-one-img">
						<img src="{{ asset('site/img/msa/fc-6.jpg') }}" alt="Contribuição" class="img-fluid">
					</div>
				</div>
				<div class="col-md-4">
					<h2 class="text-msa font-weight-bold pt-5">Campanhas</h2>
					<h4 class="text-gray-dark">Colabore com estudantes de diversas instituições de ensino.</h4>
					<p>Faça parte de um grupo seleto de pessoas que ajudam estudantes a terminarem seu curso, tornando o mundo melhor e fazendo o bem.</p>
					<h4 class="text-gray-dark">Recompensas de arrepiar!</h4>
					<p>Para cada contribuição, receba uma recompensa relacionada. Tem jogos, objetos personalizados, arte e muito mais! Além de fazer o bem, você tem acesso a produtos e serviços exclusivos.</p>
					<h4 class="text-gray-dark">Facilidades na sua contribuição</h4>
					<p>Patrocine um projeto com boleto ou cartão de crédito (podendo parcelar em até 6x)!</p>
				</div>
				<div class="col-md-5">
					<img src="{{ asset('site/img/msa/fc-cel-msa.png') }}" alt="Financiamento" class="w-75 pt-5">
				</div>
			</div>
		</div>
	</section>

	<section id="financing-project">
		<div class="container">
			<div class="row justify-content-center align-items-center">
	            <div class="col-xs-12 col-md-8 text-center">
	                <h1>Tudo isso de graça? <span>Sim.</span></h1>
	                <p class="text-justify w-50 pl-5 ml-3">Basta criar personalizar e vu alá sua campanha em segundos. Então somos eficientes para você não ter que pagar nada.</p>
	                <div class="text-center">
	                	{{-- <a href="#" title="Começa Projetos" class="btn-msa" data-toggle="modal" data-target="#LoginFinancing">Começar Projetos</a> --}}
	                	<a href="{{ url('/financiamento/criar-campanha') }}" title="Começa Projetos" class="btn-msa" >Começar Projetos</a>
	                	
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	@include('sites.financing.partials.login-financiamento', ['some' => 'data'])

@endsection