<div class="form-group">

	{!! Form::label('title', 'Titulo da campanha') !!}

	@if ($errors->get('title'))

	@foreach ($errors->get('title') as $error)

	{!! Form::text('title', null, ['class' => 'form-control is-invalid', 'required']) !!}
	
	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach
	
	@else
	
	{!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('goal', 'Objetivo') !!}

		@if ($errors->get('goal'))

		@foreach ($errors->get('goal') as $error)

		{!! Form::text('goal', null, ['class' => 'form-control is_invalid', 'placeholder' =>'R$ 5000.00', 'required']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('goal', null, ['class' => 'form-control', 'placeholder' =>'R$ 5000.00', 'required']) !!}

		@endif
	</div>
	
	<div class="form-group col">
		{!! Form::label('funds_received', 'Fundos recebidos') !!}

		@if ($errors->get('funds_received'))

		@foreach ($errors->get('funds_received') as $error)


		{!! Form::text('funds_received', null, ['class' => 'form-control is-invalid', 'placeholder' =>'R$ 0.00']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('funds_received', null, ['class' => 'form-control', 'placeholder' =>'R$ 0.00']) !!}


		@endif
	</div>
	
	<div class="form-group col">
		{!! Form::label('start_date', 'Data inicial') !!}

		@if ($errors->get('start_date'))

		@foreach ($errors->get('start_date') as $error)

		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control is-invalid', 'required']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}
		
		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('end_date', 'Data final') !!}

		@if ($errors->get('end_date'))

		@foreach ($errors->get('end_date') as $error)

		{!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control is-invalid', 'required']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}

		@endif
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição da campanha') !!}

	@if ($errors->get('description'))

	@foreach ($errors->get('description') as $error)

	{!! Form::textarea('description', null, ['class' => 'form-control is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="form-group">
	{!! Form::label('location', 'Localização da campanha') !!}

	@if ($errors->get('location'))

	@foreach ($errors->get('location') as $error)

	{!! Form::text('location', null, ['class' => 'form-control is-invalid']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('location', null, ['class' => 'form-control']) !!}

	@endif
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('category_id', 'Categoria da campanha') !!}

		@if ($errors->get('category_id'))

		@foreach ($errors->get('category_id') as $error)

		{!! Form::select('category_id', $categories, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('student_id', 'Estudante da campanha') !!}
		
		@if ($errors->get('student_id'))

		@foreach ($errors->get('student_id') as $error)

		{!! Form::select('student_id', $students, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um Estudante --', 'required']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else
		
		{!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' =>'--Selecione um Estudante--', 'required']) !!}
		
		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('status', 'Estado') !!}

		@if ($errors->get('status'))

		@foreach ($errors->get('status') as $error)
		
		{!! Form::select('status', [ '1' => 'Ativo','0' => 'Inativo'], null, ['class' => 'form-control is-invalid']) !!}

		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else
		
		{!! Form::select('status', [ '1' => 'Ativo','0' => 'Inativo'], null, ['class' => 'form-control']) !!}

		@endif	
	</div>
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>

