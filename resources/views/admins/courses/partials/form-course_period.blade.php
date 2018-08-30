<div class="col">
	<div class="form-group">
		{!! Form::label('period_id', 'periodo') !!}

		@if(session('erros_period'))
		
		{!! Form::select('period_id', $period, session('period_id'), ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um turno  --', 'required']) !!}


		<div class="invalid-feedback">
			{{ (session('erros_period')) }}
		</div>

		

		@else

		{!! Form::select('period_id', $period, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um turn --', 'required']) !!}

		@endif 
	</div>
	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
	</div>
</div>
