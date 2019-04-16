<div class="form-group">
   {!! Form::label('country_id', 'País') !!}
   {!!  Form::select('country_id', $selectCountries, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('name', 'Nome do Estado') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('sigla', 'sigla') !!}
	{!! Form::text('sigla', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'slug') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'status') !!}
	{!! Form::select('status', ['' => 'Visibilidade', 0 => 'Inativo', 1 => 'Ativo'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}

</div>