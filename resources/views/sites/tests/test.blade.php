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

        @foreach ($campings as $camping)
            <div class="card">
                @if (Storage::disk('images')->has($camping->file_path))
                    <img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="{{ url('/miniatura/'. $camping->file_path) }}" data-holder-rendered="true">
                @endif
            </div>
        @endforeach

        <section class="pt-5">
            @php
                // Define os valores a serem usados
            $data_inicial = '22/06/2018';
            $data_final = '22/07/2018';
            // Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
            function geraTimestamp($data) {
                $partes = explode('/', $data);
                return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
            }
            // Usa a função criada e pega o timestamp das duas datas:
            $time_inicial = geraTimestamp($data_inicial);
            $time_final = geraTimestamp($data_final);
            // Calcula a diferença de segundos entre as duas datas:
            $diferenca = $time_final - $time_inicial; // 19522800 segundos
            // Calcula a diferença de dias
            $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
            // Exibe uma mensagem de resultado:
            echo "A diferença entre as datas ".$data_inicial." e ".$data_final." é de <strong>".$dias."</strong> dias";
            // A diferença entre as datas 23/03/2009 e 04/11/2009 é de 225 dias
            echo $end_at = date('Y-m-d H:i:s', strtotime('+30 days'));
            echo "<br>";
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2018-07-20 00:00:00');
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2018-08-20 00:00:00');
            $diff_in_days = $to->diffInDays($from);
            print_r($diff_in_days); // Output: 1

            echo "<br>";
            echo \Carbon\Carbon::now('America/Sao_Paulo');
            @endphp
        </section>
        <div class="container">
            <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
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
    {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
    {{-- <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
      };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script> --}}

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      // var editor_config = {
      //   path_absolute : "/",
      //   selector: "textarea.my-editor",
      //   plugins: [
      //     "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      //     "searchreplace wordcount visualblocks visualchars code fullscreen",
      //     "insertdatetime media nonbreaking save table contextmenu directionality",
      //     "emoticons template paste textcolor colorpicker textpattern"
      //   ],
      //   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      //   relative_urls: false,
      //   file_browser_callback : function(field_name, url, type, win) {
      //     var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      //     var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      //     var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      //     if (type == 'image') {
      //       cmsURL = cmsURL + "&type=Images";
      //     } else {
      //       cmsURL = cmsURL + "&type=Files";
      //     }

      //     tinyMCE.activeEditor.windowManager.open({
      //       file : cmsURL,
      //       title : 'Filemanager',
      //       width : x * 0.8,
      //       height : y * 0.8,
      //       resizable : "yes",
      //       close_previous : "no"
      //     });
      //   }
      // };

      // tinymce.init(editor_config);
    </script>
@endsection