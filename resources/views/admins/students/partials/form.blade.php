<div class="row">
	<div class="form-group col">
		{!! Form::label('name', 'Nome Completo') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('cpf', 'CPF') !!}
		{!! Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('data_of_birth', 'Data de Nascimento') !!}
		{{-- {!! Form::date('data_of_birth', null, ['class' => 'form-control']) !!} --}}
		{!! Form::date('data_of_birth', \Carbon\Carbon::now(),['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(75) 00000-0000', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('cep', 'CEP') !!}
		{!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => '00000-000', 'required']) !!}
	</div>
</div>

{!! Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control', 'required']) !!}

{{-- <div class="form-group">
	{!! Form::label('state', 'Estado') !!}
	{!! Form::select('state',[''=> '-- Selecione o Estado --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div> --}}

{{-- <div class="form-group">
	{!! Form::label('city', 'Cidade') !!}
	{!! Form::select('city',[''=> '-- Selecione a Cidade --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div> --}}

<div class="row">
	<div class="form-group col">
		{!! Form::label('state', 'Estado') !!}
		{!! Form::select('state_id',$states, null, ['placeholder' => '-- Selecione um estado --', 'class' => 'form-control']) !!}
	</div>
	<div class="form-group col">
		{!! Form::label('cidade_id', 'Cidade') !!}
		{!! Form::select('city_id',$cities, null, ['placeholder' => '-- Selecione uma cidade --', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('street', 'Rua') !!}
		{!! Form::text('street', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('number', 'Número') !!}
		{!! Form::text('number', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('neighborhood', 'Bairro') !!}
		{!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('complement', 'Complemento') !!}
		{!! Form::text('complement', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-md-2">
		{!! Form::label('status', 'Situação') !!}
		{!! Form::select('status', [''=> 'Visivilidade','0' => 'Inativo', '1' => 'Ativo'], null, ['class' => 'form-control']) !!}
	</div>
</div>




<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>