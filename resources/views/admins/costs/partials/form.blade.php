<div class="form-group">
	{!! Form::label('name', 'Nome') !!}
	@if ($errors->get('name'))

	@foreach ($errors->get('name') as $error)

	{!! Form::text('name', null, ['class' => 'form-control  is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>
	
	@endforeach

	@else

	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="form-group">
	{!! Form::label('duration', 'Duração') !!}
	@if ($errors->get('duration'))

	@foreach ($errors->get('duration') as $error)

	{!! Form::text('duration', null, ['class' => 'form-control  is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>
	
	@endforeach

	@else

	{!! Form::text('duration', null, ['class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="form-group">
	{!! Form::label('evaluation', 'avaliação') !!}
	@if ($errors->get('evaluation'))

	@foreach ($errors->get('evaluation') as $error)

	{!! Form::text('evaluation', null, ['class' => 'form-control  is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>
	
	@endforeach

	@else

	{!! Form::text('evaluation', null, ['class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="form-group">
	{!! Form::label('abstract', 'abstrato') !!}

	@if ($errors->get('abstract'))

	@foreach ($errors->get('abstract') as $error)
	
	{!! Form::textarea('abstract', null, ['class' => 'form-control is-invalid', 'required']) !!}
	

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('abstract', null, ['class' => 'form-control', 'required']) !!}

	@endif 
</div>

<div class="form-group">
	{!! Form::label('monthly_payment', 'Pagamento Mensal') !!}

	@if ($errors->get('monthly_payment'))

	@foreach ($errors->get('monthly_payment') as $error)
	
	{!! Form::text('monthly_payment', null, ['class' => 'form-control is-invalid', 'required']) !!}
	

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('monthly_payment', null, ['class' => 'form-control', 'required']) !!}

	@endif 
</div>


<div class="form-group">

	<div class="form-group">
		{!! Form::label('discount', 'Desconto') !!}

		@if ($errors->get('discount'))

		@foreach ($errors->get('discount') as $error)

		{!! Form::text('discount', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('discount', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>

	<div class="form-group">
		{!! Form::label('scholarship', 'Bolsa de Estudos') !!}

		@if ($errors->get('scholarship'))

		@foreach ($errors->get('scholarship') as $error)

		{!! Form::text('scholarship', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('scholarship', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>
    
        <div class="form-group">
		{!! Form::label('economy', 'Economia') !!}

		@if ($errors->get('economy'))

		@foreach ($errors->get('economy') as $error)

		{!! Form::text('economy', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('economy', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>
    
        <div class="form-group">
		{!! Form::label('vacancy', 'Vaga') !!}

		@if ($errors->get('vacancy'))

		@foreach ($errors->get('vacancy') as $error)

		{!! Form::text('vacancy', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('vacancy', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>
    
        <div class="form-group">
		{!! Form::label('status', 'Status') !!}

		@if ($errors->get('status'))

		@foreach ($errors->get('status') as $error)

		{!! Form::text('status', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('status', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>
    
        


	<div class="row">
		<div class="form-group col">
			{!! Form::label('course_id', 'Curso') !!}

			@if ($errors->get('course_id'))

			@foreach ($errors->get('course_id') as $error)

			{!! Form::select('course_id', $courses, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um curso  --', 'required']) !!}


			<div class="invalid-feedback">
				{{ $error }}
			</div>

			@endforeach

			@else

			{!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um curso --', 'required']) !!}

			@endif 
		</div>

		<div class="form-group col">
			{!! Form::label('level_id', 'Nível') !!}

			@if ($errors->get('level_id'))

			@foreach ($errors->get('level_id') as $error)

			{!! Form::select('level_id', $levels, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um Nível  --', 'required']) !!}


			<div class="invalid-feedback">
				{{ $error }}
			</div>

			@endforeach

			@else

			{!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um Nível --', 'required']) !!}

			@endif 
		</div>
            
                <div class="form-group col">
			{!! Form::label('period_id', 'Período') !!}

			@if ($errors->get('period_id'))

			@foreach ($errors->get('period_id') as $error)

			{!! Form::select('period_id', $periods, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um Período  --', 'required']) !!}


			<div class="invalid-feedback">
				{{ $error }}
			</div>

			@endforeach

			@else

			{!! Form::select('period_id', $periods, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um Período --', 'required']) !!}

			@endif 
		</div>
	</div>
	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
	</div>
</div>

