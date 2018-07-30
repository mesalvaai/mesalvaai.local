{!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!}

<div class="form-group pb-4">
	<h4 class="font-weight-bold">{!! Form::label('title', '1. Qual é o título da sua campanha?') !!}</h4>
	{!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control' , 'required', 'placeholder' => 'Ex.: "Realizar meu sonho de estudar no exterior"']) !!}
	@if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

{{-- <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a href="#" title="">Veja alguns exemplos</a></span>
  </div>
</div> --}}
<div class="form-group pb-4">
	<h4 class="font-weight-bold">{!! Form::label('category_id', '2. Qual é o modelo do projeto?') !!}</h4>
	<div class="input-group mb-3">
		{!! Form::select('category_id', $categories, null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}
	  	<div class="input-group-append">
	    	<a class="btn btn-outline-success" href="#">Veja alguns exemplos</a>
	  	</div>
	  	@if ($errors->has('category_id'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('category_id') }}</strong>
	        </span>
	    @endif
	</div>
</div>

{{-- <div class="form-group pb-4">
	<h4 class="font-weight-bold">{!! Form::label('file_path', '3. Escolha uma imagem para ilustrar a sua campanha') !!}</h4>
	<div class="input-group">
		<div class="custom-file">
		    <input type="file" class="custom-file-input" id="inputGroupFile04">
		    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
		</div>
		<div class="input-group-append">
		    <button class="btn btn-outline-secondary" type="button">Button</button>
		</div>
	</div>
</div> --}}


<div class="form-group pb-4">
	<h4 class="font-weight-bold">{!! Form::label('file_path', '3. Escolha uma imagem para ilustrar a sua campanha') !!}</h4>
	<div class="input-group mb-3">
        <div class="custom-file">
            {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
            {!! Form::file('file_path', ['class' => $errors->has('file_path') ? 'custom-file-input is-invalid' : 'custom-file-input', 'id' =>'inputGroupFile02']) !!}
            	<label class="custom-file-label" for="inputGroupFile02">Procurar arquivo</label>
        </div>
        <div class="input-group-append">
		    <button class="btn btn-outline-success" type="button">Veja exemplos de imagens de campanhas de sucesso</button>
		</div>
    </div>
    <small class="form-text text-muted">Arquivo devem ter menos que 1 MB. Tipos de arquivos permitidos: png,gif,jpg,jpeg, mp4.</small>
    @if ($errors->has('file_path'))
        <span class="invalid-feedback" style="display: block;">
            <strong>{{ $errors->first('file_path') }}</strong>
        </span>
    @endif
</div>

<div class="form-group pb-4">
	<h4 class="font-weight-bold">4. Conte um pouco sobre o seu projeto:</h4>
	<b>{!! Form::label('abstract', 'Resuma seu projeto em 160 caracteres *') !!}</b>
	{!! Form::textarea('abstract', null, ['class' => $errors->has('abstract') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required']) !!}
	<span class="float-right">Restam 160 caracteres</span>
	<small class="text-muted">Faça aqui uma breve descrição sobre seu projeto. Utilize uma frase de efeito que explique a importância e objetivo da sua campanha. Você terá um espaço maior para descrever sua ideia detalhadamente mais a frente.</small>
	@if ($errors->has('abstract'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('abstract') }}</strong>
        </span>
    @endif
</div>

<div class="form-group pb-4">
	<b>{!! Form::label('description', 'Descreva com um pouco mais detalhes as ações e objetivos do seu projeto.*') !!}</b>
	{!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
	<small class="text-muted">Fale porque seu projeto é tão relevante e merece a contribuição de todos.</small>
	<p>Para dicas de como contar sua historia, <a href="#" title="">veja essas dicas aqui</a>.</p>
	@if ($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
	<div class="text-center">
		<h3 class="text-msa font-weight-bold">5. Meta: Quanto você quer arrecadar com a sua campanha?</h3>
		<p>Quanto você precisa arrecadar?</p>
		<p><strong>Defina ao menos uma meta, lembrando de considerar nesse valor os itens abaixo:</strong></p>
		<p>- Taxa de serviço da integradora financeira (4,5% do valor total arrecadado); <br>
		- Taxa de serviço da plataforma (nossa sugestão é destinar 10% do valor total arrecadado);<br>
		- Custo de produção e envio das recompensas. <br>
		​
		Quer ajuda para calcular sua meta? <a target="_blank" href="https://www.youtube.com/watch?v=TQXGaTZW9Os&feature=youtu.be&t=9m08s" title="">Veja dicas aqui </a></p>
	</div>
</div>
<div class="form-group col-md-4 offset-md-4">
	{!! Form::label('goal', 'Valor da meta*:') !!}
	<div class="input-group">
	  	<div class="input-group-prepend">
	    	<span class="input-group-text">$R</span>
	    	<span class="input-group-text">0,00</span>
	  	</div>
		{!! Form::text('goal', null, ['class' => $errors->has('goal') ? 'form-control is-invalid' : 'form-control', 'data-thousands' => '.', 'data-decimal' => ',', 'required']) !!}
	</div>
	<small class="text-muted">(mínimo de R$500,00) </small><br>
		<em><a href="#" title="Click aqui">Ainda não sabe o quanto arrecadar?</a></em>
		@if ($errors->has('goal'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('goal') }}</strong>
	        </span>
	    @endif
</div>
<br>
<h3 class="font-weight-bold">6. Qual será a duração da sua campanha?</h3><br>
<div class="row">

	<div class="form-group col-md">
		{!! Form::label('start_date', 'Inicio da Campamna') !!}
		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => $errors->has('start_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		<small class="text-muted">(máximo de 60 dias e mínimo 1 dia)</small>
		@if ($errors->has('start_date'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('start_date') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group col-md">
		{!! Form::label('end_date', 'Fin da Campanha') !!}
		{!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => $errors->has('end_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('end_date'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('end_date') }}</strong>
	        </span>
	    @endif
	</div>

</div>

<div class="row pt-5 justify-content-center text-center">
    <div class="col-4">
    	<div class="card bg-light mb-3" style="max-width: 18rem;">
		  	<div class="card-body">
		    <h5 class="card-title"><a href="#" title=""><strong>POLÍTICA DE PRIVACIDADE</strong></a></h5>
		  	</div>
		</div>
    </div>
    <div class="col-4">
    	<div class="card bg-light mb-3" style="max-width: 18rem;">
		  	<div class="card-body">
		    <h5 class="card-title"><a href="#" title=""><strong>TERMOS DE <br> USO</a></strong></h5>
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

<div class="form-group text-center pt-5">
	<b>Você está quase lá! Pode continuar e lançar sua campanha só quando quiser.</b><br><br>
	{{ Form::button('dicionar recompensas (opcional)', ['type' => 'submit', 'name' =>'op', 'value' => 'add_r', 'class' => 'btn btn-success btn-sm'] )  }}
	{{ Form::button('Salvar', ['type' => 'submit', 'name' =>'op', 'value' => 'add', 'class' => 'btn btn-primary btn-sm'] )  }}
	{{ Form::button('Visualizar e lançar seu campanha', ['type' => 'submit', 'name' =>'op', 'value' => 'show_c', 'class' => 'btn btn-info btn-sm'] )  }}
	{{-- {!! Form::submit('Adicionar recompensas (opcional)', ['class' => 'btn btn-success btn-sm']) !!}
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-sm']) !!}
	{!! Form::submit('Visualizar e lançar seu campanha', ['class' => 'btn btn-info btn-sm']) !!} --}}
	<hr>
	<b><strong class="text-msa">NOVIDADE!</strong></b> Ao clicar em qualquer um destes botões, o seu rascunho estará salvo para edição ou lançamento imediato e futuro.
</div>

@section('scripts')
	{{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
	<script>
		CKEDITOR.replace( 'description', options );
	</script> --}}
	{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> --}}
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fkczcxnlv53w329ddjwk4zeikgwenyay0wc1qlzy4bhlfunt"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
@endsection

