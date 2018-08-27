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
	{!! Form::label('content', 'Conteúdo') !!}

	@if ($errors->get('content'))

	@foreach ($errors->get('content') as $error)
	
	{!! Form::textarea('content', null, ['class' => 'form-control is-invalid', 'required']) !!}
	

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('content', null, ['class' => 'form-control', 'required']) !!}

	@endif 
</div>


<div class="form-group">

	<div class="form-group">
		{!! Form::label('benefits', 'Benefíceis') !!}

		@if ($errors->get('benefits'))

		@foreach ($errors->get('benefits') as $error)

		{!! Form::textarea('benefits', null, ['class' => 'form-control is-invalid', 'required']) !!}


		<div class="invalid-feedback">
			{{ $error }}
		</div>

		@endforeach

		@else

		{!! Form::text('benefits', null, ['class' => 'form-control', 'required']) !!}

		@endif 
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status') !!}

		@if ($errors->get('status'))

		@foreach ($errors->get('status') as $error)

		{!! Form::textarea('status', null, ['class' => 'form-control is-invalid', 'required']) !!}


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
			{!! Form::label('area_id', 'Area') !!}

			@if ($errors->get('area_id'))

			@foreach ($errors->get('area_id') as $error)

			{!! Form::select('area_id', $area, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione uma Area  --', 'required']) !!}


			<div class="invalid-feedback">
				{{ $error }}
			</div>

			@endforeach

			@else

			{!! Form::select('area_id', $area, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione uma Area --', 'required']) !!}

			@endif 
		</div>

		<div class="form-group col">
			{!! Form::label('level_id', 'Nível') !!}

			@if ($errors->get('level_id'))

			@foreach ($errors->get('level_id') as $error)

			{!! Form::select('level_id', $nivel, null, ['class' => 'form-control is-invalid', 'placeholder' =>'-- Selecione um Nível  --', 'required']) !!}


			<div class="invalid-feedback">
				{{ $error }}
			</div>

			@endforeach

			@else

			{!! Form::select('level_id', $nivel, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione um Nível --', 'required']) !!}

			@endif 
		</div>
	</div>
	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
	</div>
</div>