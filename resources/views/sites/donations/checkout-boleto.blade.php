
@extends('layouts.site.app', ['title' => 'ME SALVA AI'])


@section('content')
	<section class="campaing-for-student">
		<div class="container pt-4 pb-4">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</div>
			@endif
			<div class="row">
	            <div class="col-xs-12 col-sm-12 col-md-12">
	            	<div class="card">
	            		<div class="card-header">
	            			<b class="text-muted">Juntos caminhamos mais longe</b>
	            		</div>
	            		<div class="card-body">
	            			<p class="text-center">Obrigado pela contribuição de R$ 45,00 no Me Salva Aí <br><b>Henrique Werneck Guerreiro</b><br><em>Henrique Werneck Guerreiro</em></p>
							<br>
							<div class="form-group text-center col-sm-6 offset-3">
								<input id="CopyCodBoleto" type="text" name="codigo" value="{{ $codBoleto }}" class="form-control ">
								<br>
								<a href="#"" class="text-center btn btn-outline-secondary" id="copyCodBoleto" data-clipboard-action="copy" data-clipboard-target="#CopyCodBoleto"><em>Copiar o código</em></a>
							</div>
							
							<p class="text-center">ou</p>
							{{-- <div class="row justify-content-center">
								<div class="col-md-7 align-content-center">
									<div id="printableArea">{!! $printBoleto !!}</div>
								</div>
							</div> --}}
							<div class="text-center">
								{{-- <a target="_blank" href="{{ route('boleto.print', $hrefBoleto) }}"  class="btn btn-msa btn-sm w-50" >Clique para ver o boleto</a> --}}
								<a target="_blank" href="{{ route('boleto.print', $idBoleto) }}"  class="btn btn-msa btn-sm w-50" >Clique para ver o boleto</a>
							</div>
							<br>
							<p class="text-center"><b>Pague seu boleto até a data de vencimento. Contamos com você!</b> <br>
							{{-- <em>ID da transação: 1764921</em></p> --}}
	            		</div>
	            		<div class="card-footer text-center">
	            			<h2 class="text-msa font-weight-bold">ME SALVA AI</h2>
	            		</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</section>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('vendor/clipboard/dist/clipboard.min.js') }}" ></script>
	<script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>

	<script type="text/javascript">
		$( document ).ready(function() {
		  	var clipboard = new ClipboardJS('#copyCodBoleto');

		    clipboard.on('success', function(e) {
		        //console.log(e);
		        $(e.trigger).text("Copiado!!");
			    e.clearSelection();
			    setTimeout(function() {
			      $(e.trigger).text("Copiar o código");
			    }, 2500);
		    });

		    clipboard.on('error', function(e) {
		        console.log(e);
		    });
		});

		function gerar_boleto(){
		 	window.open('/boleto', '_blank');
		       // window.location.href = "/boleto";
		}
		
	</script>
@endsection


