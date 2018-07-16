<!-- Course Start -->
<section id="home">
    <div class="row">
       
        <div class="col-lg-6">
        
            <img src="{{ asset('site/img/msa/sec4-2.jpg') }}" alt="Cursos" class="img-fluid  img-responsivo" >
        
        </div>
        
    </div>
    <div class="pb-5"></div>
</section>
<section  >
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md justify-content-center">
                <div class=" col-12 justify-content-center text-center">
                    <h2 id="home h1" class="text-center text-msa h1">Buscar Cursos</h2>
                </div>    
                <div class="row align-items-md-center">
                <div class="col-lg-6 ">
                    <h5 class="text-center">Me Salva Aí ajuda quem quer entrar na faculdade. Reunimos informações de todos as faculdades e cursos de graduação e pós-graduação para que você possa fazer a melhor escolha. E o melhor, depois de achar o curso ideal, você pode se inscrever para descontos pelo Me Salva Aí.</h5>
                
                </div>
                    <div class="col-lg-6  text-left align-content-lg-start">
                    <section id="section-five" class="section-five-bg align-self-start">
        <div class="container">
            <div class="row ">
                
                    <div class="child-bg">
                        <h2 class="text-center">Viu como é simples</h2>
                        <p class="text-center">Basta escolher seu curso, instituição e pagar a primeira mensalidade e vó alá, divista-se até o final do curso</p>
                        <div class="row">
	<div class="form-group col">
		{!! Form::label('city', 'Cidade') !!}
		{!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('course', 'Curso') !!}
		{!! Form::text('course', null, ['class' => 'form-control',  'required']) !!}
	</div>

	
</div>
                        
                        <div class="text-center">
                            <a href="#" class="get-started-btn">Buscar bolsa</a>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
                </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
    
</section>

            
<br>       
<!-- Course End -->
<section class=" mt-30">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<figure class="figure">
				  	<img src="bootstrap/img/logos/fadba-logo.png" class="figure-img img-fluid rounded w-50 text-center" alt="A generic square placeholder image with rounded corners in a figure.">
				  	<h5 class="text-center color-blue">Administracao de Empressa</h5>
				  	<figcaption class="figure-caption">Graduação / Bacharelado</figcaption>
				  	<figcaption class="figure-caption">Presencial</figcaption>
				  	<figcaption class="figure-caption">Noturno</figcaption>
				  	<hr>
				  	<div class="card border-primary mb-3">
						{{-- <div class="card-header">Header</div> --}}
						<div class="card-body text-primary text-center">
							<p class="card-text text-"><s>de $R 597.00 por</s></p>
							<h5 class="card-title">R$ 398,05</h5>
							<p class="card-text">Bolsa de 35%</p>
						</div>
					</div>
				  	
				  	<div class="text-center">
						<a target="_parent" href="{{ url('/faculdade/id_curso') }}" class="btn btn-blue btn-lg w-75">Quero esta Bolsa</a>
					</div>
				</figure>
			</div>
			<div class="col-md-4">
				<figure class="figure">
				  	<img src="bootstrap/img/logos/logo-fadminas1.png" class="figure-img img-fluid rounded w-50 mx-auto" alt="A generic square placeholder image with rounded corners in a figure.">
				  	<h5 class="text-center color-blue">Administracao de Empressa</h5>
				  	<figcaption class="figure-caption">Graduação / Bacharelado</figcaption>
				  	<figcaption class="figure-caption">Presencial</figcaption>
				  	<figcaption class="figure-caption">Noturno</figcaption>
				  	<hr>
				  	<div class="card border-primary mb-4 text-center">
						{{-- <div class="card-header">Header</div> --}}
						<div class="card-body text-primary text-center">
							<p class="card-text text-"><s>de $R 722.00 por</s></p>
							<h5 class="card-title">R$ 505,40</h5>
							<p class="card-text">Bolsa de 30%</p>
						</div>
					</div>
					<div class="text-center">
						<a target="_parent" href="{{ url('/faculdade/id_curso') }}" class="btn btn-blue btn-lg w-75">Quero esta Bolsa</a>
					</div>
				  	
				  	
				</figure>
			</div>
			<div class="col-md-4">
				<figure class="figure">
				  	<img src="bootstrap/img/logos/unasp1.png" class="figure-img img-fluid rounded w-50 mx-auto" alt="A generic square placeholder image with rounded corners in a figure.">
				  	<h5 class="text-center color-blue">Administração de Empressa</h5>
				  	<figcaption class="figure-caption">Graduação / Bacharelado</figcaption>
				  	<figcaption class="figure-caption">Presencial</figcaption>
				  	<figcaption class="figure-caption">Noturno</figcaption>
				  	<hr>
				  	<div class="card border-primary mb-3">
						{{-- <div class="card-header">Header</div> --}}
						<div class="card-body text-primary text-center">
							<p class="card-text text-"><s>de $R 940,00 por</s></p>
							<h5 class="card-title">R$ 564,00</h5>
							<p class="card-text">Bolsa de 40%</p>
						</div>
					</div>
				  	
				  	<div class="text-center">
						<a target="_parent" href="{{ url('/faculdade/id_curso') }}" class="btn btn-blue btn-lg w-75">Quero esta Bolsa</a>
					</div>
				</figure>
			</div>
		</div>
		
	</div>		
</section>