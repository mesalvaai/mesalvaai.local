<div class="row">
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('name', 'Nome Completo') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('cpf', 'CPF') !!}
		{!! Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		<small id="emailHelp" class="form-text text-muted">As notificações de sua campanha serão enviadas para este e-mail. Se quiser pode alterar o e-mail cadastrado <a href="#" title="Alterar E-mail">aqui</a>.</small>
	</div>

	<div class="form-group col-xs-12 col-md col-lg-3">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(75) 00000-0000', 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('data_of_birth', 'Data de Nacimento') !!}
		{!! Form::text('data_of_birth', null , ['class' => 'form-control', 'required','placeholder' => '00/00/0000']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('how_met_us', 'Como conheceu a Me Salva Aí? *') !!}
		{!! Form::select('how_met_us', [''=> 'Selecione','google' => 'Google', 'facebook' => 'Facebook', 'e-mail' => 'E-mail', 'amigos' => 'Um amigo', 'outros' => 'Outros'], null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('cep', 'cep') !!}
		{!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => '00 000.000', 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		@if(isset($student))

		{!! Form::label('country_id', 'País') !!}
		{!! Form::select('country_id', $countries, null, ['placeholder' => '-- Selecione um Pais --', 'class' => 'form-control', 'required']) !!}

		@else

		{!! Form::label('country_id', 'País') !!}
		{!! Form::select('country_id', $countries, $idPais, ['placeholder' => '-- Selecione um Pais --', 'class' => 'form-control', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('state_id', 'Estado') !!}
		{!! Form::select('state_id',$states, null, ['placeholder' => '-- Selecione um estado --', 'class' => 'form-control', 'required']) !!}
	</div>
	
	<div class="form-group col">
		@if(isset($student))

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', $cities, null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control', 'required']) !!}

		@else

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', [], null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('street', 'Rua') !!}
		{!! Form::text('street', null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="row">
	

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('number', 'Número') !!}
		{!! Form::text('number', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('neighborhood', 'Bairro') !!}
		{!! Form::text('neighborhood', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('complement', 'Complemento') !!}
		{!! Form::text('complement', null, ['class' => 'form-control', 'required']) !!}
	</div>
	

	<div class="form-group col-md-2">
		{!! Form::label('status', 'Situação') !!}
		{!! Form::select('status', [''=> 'Selecione','0' => 'Inativo', '1' => 'Ativo'], null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit('Alterar Estudante', ['class' => 'btn btn-msa btn-sm float-left']) !!}
</div>