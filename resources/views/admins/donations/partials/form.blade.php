<div class="form-group">
	{!! Form::label('campaign_id', 'Campanha') !!}
	{!! Form::select('campaign_id', [''=> '-- Selecione uma campanha --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('total_amount', 'Valor total') !!}
	{!! Form::text('total_amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('donation_date', 'Data da doação') !!}
	{!! Form::text('donation_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('details', 'Detalhes') !!}
	{!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('full_name', 'Nome Completo') !!}
	{!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('country', 'Pais') !!}
	{!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('postal_code', 'CEP') !!}
	{!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Satus da doação') !!}
	{!! Form::select('status', [''=> '','0' => '0', '1' => '1'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::checkbox('anonymus', '1', false,['class'=> 'form-group']) !!}	
	<a> &nbsp; &nbsp; Fazer esta doação anonimamente</a>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>