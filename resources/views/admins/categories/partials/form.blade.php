<div class="form-group">
	{!! Form::label('name', 'Categoria') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Estado') !!}
	{!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>