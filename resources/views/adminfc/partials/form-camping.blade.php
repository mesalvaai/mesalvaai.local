{!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!}

<div class="form-group">
	{!! Form::label('title', 'Nome da Campanha*') !!}
	{!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control' , 'required']) !!}
	@if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
	{!! Form::label('abstract', 'Resuma seu projeto em 160 caracteres *') !!}
	{!! Form::textarea('abstract', null, ['class' => $errors->has('abstract') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required']) !!}
	<span class="float-right">Restam 160 caracteres</span>
	@if ($errors->has('abstract'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('abstract') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
	{!! Form::label('description', 'Descreva com um pouco mais detalhes as ações e objetivos do seu projeto.*') !!}
	{!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
	@if ($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<div class="row">
	<div class="form-group col-md">
		{!! Form::label('start_date', 'Inicio da Campamna') !!}
		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => $errors->has('start_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
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

<div class="row">
	<div class="form-group col-md-4">
		{!! Form::label('category_id', 'Modelo de projeto*') !!}
		{!! Form::select('category_id', $categories, null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}
		@if ($errors->has('category_id'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('category_id') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="form-group col-md">
		{!! Form::label('file_path', 'Escolha uma imagem ou video para ilustrar seu projeto') !!}
		<div class="input-group mb-3">
	        <div class="custom-file">
	            {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
	            {!! Form::file('file_path', ['class' => $errors->has('file_path') ? 'custom-file-input is-invalid' : 'custom-file-input', 'id' =>'inputGroupFile02']) !!}
	            	<label class="custom-file-label" for="inputGroupFile02">Procurar arquivo</label>
	        </div>
	    </div>
	    <small class="form-text text-muted">Arquivo devem ter menos que 1 MB. Tipos de arquivos permitidos: png,gif,jpg,jpeg, mp4.</small>
	    @if ($errors->has('file_path'))
	        <span class="invalid-feedback" style="display: block;">
	            <strong>{{ $errors->first('file_path') }}</strong>
	        </span>
	    @endif
	</div>
    {{-- <div class="custom-file">
	   <input id="logo" type="file" class="custom-file-input">
	   <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
	</div> --}}
	{{-- <div class="form-group col-md">
		{!! Form::label('file_path', 'Escolha uma imagem ou video para ilustrar seu projeto') !!}
		{!! Form::file('file_path', null, ['class' => $errors->has('file_path') ? 'form-control-file is-invalid' : 'form-control-file', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}
		<small class="form-text text-muted">Arquivo devem ter menos que 1 MB. Tipos de arquivos permitidos: png,gifjpg,jpeg, mp4.</small>
		@if ($errors->has('file_path'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('file_path') }}</strong>
	        </span>
	    @endif
	</div> --}}
</div>
<div class="form-group">
	<div class="text-center">
		<h3 class="text-msa">Metas</h3>
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
	{!! Form::text('goal', null, ['class' => $errors->has('goal') ? 'form-control is-invalid' : 'form-control', 'placeholder' =>'R$ 5000.00', 'required']) !!}
	@if ($errors->has('goal'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('goal') }}</strong>
        </span>
    @endif
</div>

{!! Form::hidden('student_id', (session()->has('student_id')) ? session()->get('student_id') : $student_id, ['readonly']) !!}
{!! Form::hidden('status', 0,  ['readonly']) !!}

<div class="form-group text-center pt-5">
	{!! Form::submit('Criar Campanha', ['class' => 'btn btn-msa btn-sm']) !!}
</div>

