
<div class="form-group">
	{!! Form::label('name', 'Nome Completo') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cpf', 'CPF') !!}
	{!! Form::text('cpf', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('data_of_birth', 'Data de Nascimento') !!}
	{!! Form::date('data_of_birth', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('phone', 'Telefone') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cep', 'CEP') !!}
	{!! Form::text('cep', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('state', 'Estado') !!}
	{!! Form::select('state',[''=> '-- Selecione o Estado --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('city', 'Cidade') !!}
	{!! Form::select('city',[''=> '-- Selecione a Cidade --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('street', 'Rua') !!}
	{!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('number', 'Número') !!}
	{!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('neighborhood', 'Bairro') !!}
	{!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('complement', 'Complemento') !!}
	{!! Form::text('complement', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Status do Estudante') !!}
	{!! Form::select('status', [''=> '','0' => '0', '1' => '1'], null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>