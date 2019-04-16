<div class="col">
	<div class="form-group">
		{!! Form::label('modality_id', 'Modalidade') !!}

		@if (session('erros_modality'))

		{!! Form::select('modality_id', $modality, session('modality_id'), ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione uma modalidade  --', 'required']) !!}


		<div class="invalid-feedback">
			{{ session('erros_modality') }}
		</div>

		

		@else

		{!! Form::select('modality_id', $modality, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione uma modalidade --', 'required']) !!}

		@endif 
	</div>
	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
	</div>
</div>
