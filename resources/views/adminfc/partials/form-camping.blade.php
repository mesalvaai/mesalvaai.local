{!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="form-group pb-4 row">

	<h4 class="font-weight-bold">{!! Form::label('title', '1. Qual é o título da sua campanha?*  &nbsp; &nbsp;') !!}</h4><i  class="fa fa-question-circle-o" data-toggle="modal" data-target="#titulo-campanha"></i>

	{!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control' , 'required', 'placeholder' => 'Ex.: "Realizar meu sonho de estudar no exterior"']) !!}
	@if ($errors->has('title'))
	<span class="invalid-feedback">
		<strong>{{ $errors->first('title') }}</strong>
	</span>
	@endif
</div>

<!-- Modal -->
<div class="modal fade" id="titulo-campanha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Ele deve ser curto, direto e capaz de "vender" a sua ideia rapidamente. Explique em poucas palavras o propósito de sua campanha, despertando o interesse de quem veja.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div class="form-group pb-4 row">
	<h4 class="font-weight-bold">{!! Form::label('category_id', '2. Qual é o modelo do projeto?*  &nbsp; &nbsp;') !!}</h4>
	<i  class="fa fa-question-circle-o" data-toggle="modal" data-target="#modelo-projeto"></i>

	<!-- Modal -->
	<div class="modal fade" id="modelo-projeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Qual é o objetivo de sua campanha pagar as mensalidades: Graduação, Pós-graduação, mestrado, doutorado, intercambia-o.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="input-group mb-3">
		{!! Form::select('category_id', $categories, null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}
		
		@if ($errors->has('category_id'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('category_id') }}</strong>
		</span>
		@endif
	</div>
</div>


<div class="form-group pb-4 row">
	<h4 class="font-weight-bold">{!! Form::label('file_path', '3. Escolha uma imagem para ilustrar a sua campanha*  &nbsp; &nbsp;') !!}</h4>
	<i  class="fa fa-question-circle-o" data-toggle="modal" data-target="#imagem-campanha"></i>

	<div class="input-group mb-3">
		<div class="custom-file">
			{{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
			{!! Form::file('file_path', ['class' => $errors->has('file_path') ? 'custom-file-input is-invalid' : 'custom-file-input', 'id' =>'inputGroupFile02']) !!}
			<label class="custom-file-label" for="inputGroupFile02">Procurar arquivo</label>
		</div>
		
	</div>
	<small class="form-text text-muted">Arquivos devem ter menos que 1 MB. Tipos de arquivos permitidos: png,gif,jpg,jpeg, mp4.</small>
	@if ($errors->has('file_path'))
	<span class="invalid-feedback" style="display: block;">
		<strong>{{ $errors->first('file_path') }}</strong>
	</span>
	@endif
</div>

<!-- Modal -->
<div class="modal fade" id="imagem-campanha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Uma imagem que represente bem sua graduação ou mestrado... Procure uma imagem que identifique sua profissão e fique com a cara de sua campanha. 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div class="form-group pb-4">
	<div class="row">
		<h4 class="font-weight-bold">4. Conte um pouco sobre o seu projeto:</h4> &nbsp; &nbsp; &nbsp; &nbsp; <i  class="fa fa-question-circle-o" data-toggle="modal" data-target="#detalhes-projeto"></i>
	</div>
	<b>{!! Form::label('abstract', 'Resuma seu projeto em 160 caracteres *') !!}</b>
	{!! Form::textarea('abstract', null, ['class' => $errors->has('abstract') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required', 'maxlength' => '160']) !!}
	<span class="float-right caracteres-abstract">Restam 160 caracteres.</span>

	<small class="text-muted">Faça aqui uma breve descrição sobre seu projeto. Utilize uma frase de efeito que explique a importância e objetivo da sua campanha. Você terá um espaço maior para descrever sua ideia detalhadamente mais a frente.</small>
	@if ($errors->has('abstract'))
	<span class="invalid-feedback">
		<strong>{{ $errors->first('abstract') }}</strong>
	</span>
	@endif
</div>

<!-- Modal -->
<div class="modal fade" id="detalhes-projeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Faça aqui uma breve descrição sobre seu projeto. Utilize uma frase de efeito que explique a importância e objetivo da sua campanha. Você terá um espaço maior para descrever sua ideia detalhadamente mais a frente.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div class="form-group pb-4">


	<b>{!! Form::label('description', 'Descreva com um pouco mais detalhes as ações e objetivos do seu projeto.*  &nbsp; &nbsp;') !!}  <i  class="fa fa-question-circle-o" data-toggle="modal" data-target="#description-projeto">
	</i></b>
	{!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'required', 'maxlength' => '300']) !!}

	<!-- <span class="float-right caracteres-description">Restam 300 caracteres</span> -->



	<small class="text-muted">Fale porque seu projeto é tão relevante e merece a contribuição de todos.</small>
	<p>Dicas de como contar sua história. <a href="#" title="">Veja essas dicas aqui</a>.</p>
	@if ($errors->has('description'))
	<span class="invalid-feedback">
		<strong>{{ $errors->first('description') }}</strong>
	</span>
	@endif
</div>

<!-- Modal -->
<div class="modal fade" id="description-projeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Fale porque seu projeto é tão relevante e merece a contribuição de todos.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="text-center">
		<h4 class="text-msa font-weight-bold">5. Meta: Quanto você quer arrecadar com a sua campanha?</h4>
		<p>Quanto você precisa arrecadar?</p>
		<p><strong>Defina ao menos uma meta, lembrando de considerar nesse valor os itens abaixo:</strong></p>
		<p>	- Taxa de serviço da plataforma (nossa sugestão é destinar 10% do valor total arrecadado);<br>
			- Custo de produção e envio das recompensas. <br>
		</p>

		Quer ajuda para calcular sua meta? <a href="" data-toggle="modal" data-target="#explication" title="">Veja dicas aqui </a></p>
		<!-- Modal -->
		<div class="modal fade bd-example-modal-lg" id="explication" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Dicas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h5>Calculando Porcentagem</h5>
						<p>Primeiro considere o capital que você precisa (ex. R$ 5.000,00), depois lembre que desse valor 10% é taxa de serviço da plataforma Me Salva Aí (ex. R$5.000,00-10%=R$4.500,00), ou seja seu saldo final será de R$4.500,00. Lembrando sempre que independente da meta alcançada a taxa de 10% sobre o valor arrecadado se mantém, por isso orientamos sempre que ao calcular sua meta incluir os valores dos serviços da Plataforma Me Salva Aí.
						Exemplo: Meta=R$5.000,00; Taxa=10% (R$500,00); Saldo=R$4.500,00</p>
						<hr>
						<h5>Calculando Frete e Produção de Recompensas</h5>
						<p>Ao criar sua campanha se decidir oferecer recompensas lembre-se de que todos os custos para produzir e enviar são por sua conta, “orientamos que calcule sua meta considerando todos os custos da produção e envio das recompensas” por isso antes certifique nos <a href="http://www2.correios.com.br/sistemas/precosPrazos/"  target="_blank" title="Correios">correios</a> prazo de entrega, valor unitário de cada envio. Lembre-se, as recompensas são valores emocionais para você e para seus doadores</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<div class="form-group col-md-4 offset-md-4">
	{!! Form::label('goal', 'Valor da meta*:') !!}
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">R$</span>
			<span class="input-group-text">0,00</span>
		</div>
		{!! Form::text('goal', null, ['class' => $errors->has('goal') ? 'form-control is-invalid' : 'form-control', 'data-thousands' => '.', 'data-decimal' => ',', 'required']) !!}
		@if ($errors->has('goal'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('goal') }}</strong>
		</span>
		@endif
	</div>
	<small class="text-muted">(mínimo de R$500,00) </small><br>
	
	
</div>
<br>
<h4 class="font-weight-bold">6. Qual será a duração da sua campanha?</h4><br>
<div class="row">

	<div class="form-group col-md">
		{!! Form::label('start_date', 'Início da Campamna') !!}
		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => $errors->has('start_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		<small class="text-muted">(máximo de 60 dias e mínimo 1 dia)</small>
		@if ($errors->has('start_date'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('start_date') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group col-md">
		{!! Form::label('end_date', 'Fim da Campanha') !!}
		{!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => $errors->has('end_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('end_date'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('end_date') }}</strong>
		</span>
		@endif
	</div>

</div>
<br>
<h4 class="font-weight-bold">7. Adicione suas redes sociais para promover sua campanha (opcional)</h4><br>
<div class="row">

	<div class="form-group col-md">
		{!! Form::label('facebook', 'Início da Campanha') !!}
		{!! Form::text('facebook', 'https://www.facebook.com/', ['class' => 'form-control']) !!}
		<small class="text-warning">(Ex: https://www.facebook.com/<b>nome-de-usuario</b>)</small>
	</div>

	<div class="form-group col-md">
		{!! Form::label('twitter', 'Início da Campanha') !!}
		{!! Form::text('twitter', 'https://twitter.com/', ['class' => 'form-control']) !!}
		<small class="text-warning">(Ex: https://twitter.com/<b>nome-de-usuario</b>)</small>
	</div>

	<div class="form-group col-md">
		{!! Form::label('instagram', 'Início da Campanha') !!}
		{!! Form::text('instagram', 'https://www.instagram.com/', ['class' => 'form-control']) !!}
		<small class="text-warning">(Ex: https://www.instagram.com/<b>nome-de-usuario</b>)</small>
	</div>

</div>
<div class="row pt-5 justify-content-center text-center">
	<div class="col-4">
		<div class="card bg-light mb-3" style="max-width: 18rem;">
			<div class="card-body">
				<a href="#" title=""><strong>POLÍTICA DE PRIVACIDADE</strong></a>
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="card bg-light mb-3" style="max-width: 18rem;">
			<div class="card-body">
				<a href="#" title=""><strong>TERMOS DE USO</a></strong>
			</div>
		</div>
	</div>
	<div class="form-check form-check-inline">
		{{-- {{ Form::checkbox('terms_of_use', old('terms_of_use') ? 'checked' : '', null, ['class' => 'form-check-input']) }} --}}
		{!! Form::checkbox('terms_of_use',1, null,['class' => $errors->has('terms_of_use') ? 'form-check-input is-invalid' : 'form-check-input', 'required' => 'required'])!!}
		<label class="form-check-label" for="inlineCheckbox1">Eu li e estou de acordo com os Termos de Uso, Políticas de Privacidade e Termos de uso *</label>	
		@if ($errors->has('terms_of_use'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('terms_of_use') }}</strong>
		</span>
		@endif
	</div>
</div>

{!! Form::hidden('student_id', (session()->has('student_id')) ? session()->get('student_id') : $student_id, ['readonly']) !!}
{!! Form::hidden('status', 0,  ['readonly']) !!}

<b>Você está quase lá! Pode continuar e lançar sua campanha só quando quiser.</b><br><br>
<div class="row">
	<div class="col-md">
		{{ Form::button('Aicionar recompensas (opcional)', ['type' => 'submit', 'name' =>'op', 'value' => 'add_r', 'class' => 'btn btn-success btn-sm w-100'] )  }}
	</div>
	<div class="col-md">
		{{ Form::button('Salvar', ['type' => 'submit', 'name' =>'op', 'value' => 'add', 'class' => 'btn btn-msa btn-sm w-100'] )  }}
	</div>
	<div class="col-md">
		{{ Form::button('Visualizar e lançar seu campanha', ['type' => 'submit', 'name' =>'op', 'value' => 'show_c', 'class' => 'btn btn-info btn-sm w-100'] )  }}
	</div>
</div>
<hr>
<b><strong class="text-msa">NOVIDADE!</strong></b> Ao clicar em qualquer um destes botões, o seu rascunho estará salvo para edição ou lançamento imediato e futuro.
@section('scripts')
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script>
	var editor_config = {
		path_absolute : "/",
		selector: "textarea#description",
        //selector: "textarea.my-editor",
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
        	var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        	var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        	var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        	if (type == 'image') {
        		cmsURL = cmsURL + "&type=Images";
        	} else {
        		cmsURL = cmsURL + "&type=Files";
        	}

        	tinyMCE.activeEditor.windowManager.open({
        		file : cmsURL,
        		title : 'Filemanager',
        		width : x * 0.8,
        		height : y * 0.8,
        		resizable : "yes",
        		close_previous : "no"
        	});
        }
    };

    tinymce.init(editor_config);

    $(document).on("input", "#abstract", function () {
    	var limite = 160;
    	var caracteresDigitados = $(this).val().length;
    	var caracteresRestantes = limite - caracteresDigitados;

    	$(".caracteres-abstract").text("Restam " + caracteresRestantes + " caracteres.");
    });


</script>
{{-- <script>tinymce.init({ selector:'textarea' });</script> --}}
@endsection
