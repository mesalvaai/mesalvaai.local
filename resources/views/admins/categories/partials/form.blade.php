<div class="form-group">
	{!! Form::label('name', 'Categoria') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Satus da doação') !!}
	{!! Form::select('status', [''=> '--Selecione uma opção--','0' => 'Ativo', '1' => 'Inativo'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>