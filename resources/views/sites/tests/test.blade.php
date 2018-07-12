@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/grade-quebrados.css') }}">
    <style>
        .exemplo-row-flex-cols .row{
            min-height: 10rem;
            background-color: rgba(255,0,0,.1);
        }
        .exemplo-row .row>.col, .exemplo-row .row>[class^=col-]{
            background-color: rgba(86,61,124,.15);
            border: 1px solid rgba(86,61,124,.2);
            padding-top: .75rem;
            padding-bottom: .75rem;
        }
    </style>
@endsection

@section('content')
	<!--==========================
    Call To grades quebrados Section
    ============================-->
    <header class="header">
	  <h1>Black Friday, Cyber Monday</h1>
	  <h2>Discounts on all products!</h2>
	</header>
	<div class="separator"></div>

	<div class="cards">
        <div class="card">
            <header class="header">
                <h1>Cyber<br>Control</h1>
            </header>
            <div class="separator"></div>
            <section class="footer">
                <div class="product-wrapper"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/869098/originalmac.png" class="product-image"></div>

                <p>$2000</p>
            </section>
        </div>
    </div>

    <!-- Step box 04 -->
    <i class="fa fa-user fa-3x fa-bounce"></i>
    <i class="fa fa-user fa-3x fa-pulse"></i>

    <span class="pulse"></span>

    <div class="row list-steps">
    	<div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="pulse-item"><span class="mask"><i class="icon-small-digio-card"></i></span></div>
    		<h5>Peça seu Digio onde<br>e quando quiser</h5>
    		<p><a data-item="open-sidebar" href="#" title="Peça seu Digio">Clique aqui</a> para solicitar ou baixe nosso app na App Store ou Google Play.</p>
    	</div>
    	<div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="pulse-item"><span class="mask"><i class="icon-small-digio-app"></i></span></div>
    		<h5>Digital, simples<br>e descomplicado</h5><p>Você gerencia todos os seus gastos pelo celular, em tempo real, de forma fácil e interativa.</p>
    	</div>
    	<div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="pulse-item"><span class="mask"><i class="icon-small-digio-download"></i></span></div>
    		<h5>Baixe o app e solicite<br>o seu cartão =)</h5>
    		<p>Fique livre de anuidade e aproveite as facilidades da Digio Store.</p>
    	</div>
    </div>

    <section id="section-four" class="section-four-bg">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10" data-aos="fade-right">
                {{-- <img src="site/img/msa/sec4-1.jpg" alt=""> --}}
                {{-- <canvas id="canvas-image-blending" class="img-fluid"></canvas> --}}
                <figure class="snip1561">
				  	<img src="site/img/msa/sec4-1.jpg" alt="sample74" />
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
                   <p>Acabou o sufoco de conversões complexas, de pontos que expiram toda hora. Agora, você pode acumular pontos em tempo real para usar de um jeito fácil com o que você realmente quer. E no Me Salva Aí, você só ganhar.</p> 
                </div>
            </div>
        </div>
      </div>
    </section>

    <div class="container-fluid exemplo-row text-center">
            <div class="row">
                <div class="col-md">
                    col-md-1
                </div>
                <div class="col-md">
                    col-md-2
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md">
                    col-md-1
                </div>
                <div class="col-md">
                    col-md-2
                </div>
                <div class="col-md">
                    col-md-3
                </div>
                <div class="col-md">
                    col-md-4
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md">
                    col-md-1
                </div>
                <div class="col-md-6">
                    col-md-6
                </div>
                <div class="col-md">
                    col-md-3
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
            <br>
            <div class="row justify-content-start">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
            <br>
            <div class="row justify-content-between">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
            <br>
            <div class="row justify-content-around">
                <div class="col-md-2">
                    1 - col-md-2
                </div>
                <div class="col-md-2">
                    2 - col-md-2
                </div>
                <div class="col-md-2">
                    3 - col-md-2
                </div>
            </div>
        </div>
        
        <hr>
        <div class="container exemplo-row-flex-cols exemplo-row text-center">
            <div class="row align-items-start">
                <div class="col">
                    1 - col-align-items-start
                </div>
                <div class="col">
                    2 - col-align-items-start
                </div>
                <div class="col">
                    3 - col-align-items-start
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col">
                    1 - col-align-items-center
                </div>
                <div class="col">
                    2 - col-align-items-center
                </div>
                <div class="col">
                    3 - col-align-items-center
                </div>
            </div>
            <br>
            <div class="row align-items-end">
                <div class="col">
                    1 - col-align-items-end
                </div>
                <div class="col">
                    2 - col-align-items-end
                </div>
                <div class="col">
                    3 - col-align-items-end
                </div>
            </div>
            <br>
            <div class="row justify-content-center align-items-center">
                <div class="col-8">
                    1 - col-align-items-end
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-xs-12 col-md-6">
                    <div class="position-absolute" style="z-index: 2">
                        <h1 class="text-white text-center w-50" style="font-size: 5rem; padding-top: 30%;">Testes de text</h1>
                    </div>
                    <div class="row align-items-end justify-content-end bg-danger">
                        <div class="col-xs-12 col-md-6">
                            
                            <div class="bg-dark">
                                <img src="{{ asset('site/img/msa/financiamento-4.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

	<section class="footer"></section>
    
@endsection

@section('scripts')
	<script src="{{ asset('site/lib/granim/granim.min.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		// var granimInstance = new Granim({
		//     element: '#canvas-basic',
		//     name: 'basic-gradient',
		//     direction: 'left-right', // 'diagonal', 'top-bottom', 'radial'
		//     opacity: [1, 1],
		//     isPausedWhenNotInView: true,
		//     states : {
		//         "default-state": {
		//             gradients: [
		//                 ['#AA076B', '#61045F'],
		//                 ['#02AAB0', '#00CDAC'],
		//                 ['#DA22FF', '#9733EE']
		//             ]
		//         }
		//     }
		// });

		var granimInstance = new Granim({
		    element: '#canvas-image-blending',
		    direction: 'top-bottom',
		    opacity: [1, 1],
		    isPausedWhenNotInView: true,
		    image : {
		        source: 'site/img/msa/sec4-1.jpg',
		        blendingMode: 'multiply'
		    },
		    states : {
		        "default-state": {
		            gradients: [
		                ['#29323c', '#485563'],
		                ['#FF6B6B', '#556270'],
		                ['#80d3fe', '#7ea0c4'],
		                ['#f0ab51', '#eceba3']
		            ],
		            transitionSpeed: 7000
		        }
		    }
		});
	</script>
@endsection