<div class="col">
	<div class="form-group">
		{!! Form::label('turn_id', 'Turno') !!}

		@if (session('erros_turn'))

		{!! Form::select('turn_id', $turn, session('turn_id'), ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um turno  --', 'required']) !!}


		<div class="invalid-feedback">
			{{ session('erros_turn') }}
		</div>

		@else

		{!! Form::select('turn_id', $turn, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um turno --', 'required']) !!}

		@endif 
	</div>
	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
	</div>
</div>
