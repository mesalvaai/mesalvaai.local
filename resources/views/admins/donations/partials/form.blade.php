<div class="form-group">
	{!! Form::label('campaign_id', 'Campanha') !!}

	@if(isset($campaign_donation))

	{!! Form::select('campaign_id', $campaigns, $campaign_donation, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

	@else

	{!! Form::select('campaign_id', $campaigns, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione uma Campanha --', 'required']) !!}

	@endif

</div>
<div class="row">
	<div class="form-group col">
		{!! Form::label('total_amount', 'Valor total') !!}


		@if(isset($campaign_donation))

		{!! Form::text('total_amount', null, ['class' => 'form-control', 'placeholder' =>'R$ 5000.00', 'disabled' => 'disabled']) !!}

		@else
		{!! Form::text('total_amount', null, ['class' => 'form-control', 'placeholder' =>'R$ 5000.00', 'required']) !!}


		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('donation_date', 'Data da doação') !!}

		@if(isset($donation->donation_date))
		
		@php

		$date = new DateTime($donation->donation_date);

		@endphp

		{!! Form::date('donation_date', $date, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

		@else

		{!! Form::date('donation_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}

		@endif

	</div>
</div>


<div class="form-group">
	{!! Form::label('details', 'Detalhes') !!}


	@if(isset($campaign_donation))

	{!! Form::textarea('details', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

	@else

	{!! Form::textarea('details', null, ['class' => 'form-control', 'required']) !!}


	@endif
</div>


<div class="form-group">
	@if(isset($campaign_donation))

	{!! Form::text('full_name', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

	@else 

	{!! Form::label('full_name', 'Nome Completo') !!}

	@if ($errors->get('full_name'))

	@foreach ($errors->get('full_name') as $error)

	{!! Form::text('full_name', null, ['class' => 'form-control is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('full_name', null, ['class' => 'form-control','required']) !!}

	@endif

	@endif
</div>

<div class="form-group">
	@if(isset($campaign_donation))

	{!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

	@else

	{!! Form::label('email', 'Email') !!}

	@if ($errors->get('email'))

	@foreach ($errors->get('email') as $error)

	{!! Form::text('email', null, ['class' => 'form-control is-invalid', 'required']) !!}

	<div class="invalid-feedback">
		{{ $error }}
	</div>

	@endforeach

	@else

	{!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}

	@endif

	@endif
</div>


<div class="row">
	<div class="form-group col">
		{!! Form::label('country', 'País') !!}

		@if(isset($campaign_donation))

		{!! Form::select('country', $countries, null, ['class' => 'form-control', 'placeholder' => '-- Selecione um País --', 'disabled' => 'disabled']) !!}

		@else
	
		{!! Form::select('country', $countries, null, ['class' => 'form-control', 'placeholder' => '-- Selecione um País --', 'required']) !!}
	
		@endif
	</div>

	<div class="form-grou col">
		{!! Form::label('postal_code', 'CEP') !!}

		@if(isset($campaign_donation))

		{!! Form::text('postal_code', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

		@else

		{!! Form::text('postal_code', null, ['class' => 'form-control', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('status', 'Satus da doação') !!}

		@if(isset($campaign_donation))

		{!! Form::select('status', ['' => '-- Visibilidade --','1' => 'Ativa', '0' => 'Inativa'], null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

		@else

		{!! Form::select('status', ['' => '-- Visibilidade --','1' => 'Ativa', '0' => 'Inativa'], null, ['class' => 'form-control', 'required']) !!}

		@endif
	</div>
</div>

<div class="form-group">

	@if(isset($campaign_donation))

	{!! Form::checkbox('anonymus', 1, null, ['class'=> 'form-group', 'disabled' => 'disabled']) !!}	

	@else
	
	{!! Form::checkbox('anonymus', 1, null, ['class'=> 'form-group']) !!}	

	@endif

	<a> &nbsp; &nbsp; Fazer esta doação anonimamente</a>

</div>

<div class="form-group">
	@if(isset($campaign_donation))

	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left', 'disabled' => 'disabled']) !!}

	@else
	
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}

	@endif
</div>