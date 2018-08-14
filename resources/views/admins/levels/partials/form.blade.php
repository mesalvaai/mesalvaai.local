<div class="row">
	<div class="form-group col">
		{!! Form::label('name', 'Nome') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>
<div class="form-group">
	{{ Form::submit('Salvar', ['class' => 'btn btn-outline-success btn-sm']) }}
</div>