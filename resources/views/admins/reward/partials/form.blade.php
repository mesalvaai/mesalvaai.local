<div class="form-group">
	{!! Form::label('user_id', 'Id do usuario') !!}
	{!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	
	{!! Form::label('campaign_id', 'Id da campanha') !!}
	{!! Form::select('campaign_id', [''=> '-- Selecione uma campanha --','3' => '3', '4' => '4'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('donation', 'Doação') !!}
	{!! Form::text('donation', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('quantity', 'quantidade') !!}
	{!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('unlimited', 'Ilimitado') !!}
	{!! Form::text('unlimited', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('delivery_date', 'Data de Entrega: ') !!}
	{!! Form::date('delivery_date', now()->toDateString(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('delivery_mode', 'Modo de Entrega') !!}
	{!! Form::text('delivery_mode', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('variations', 'Variações') !!}
	{!! Form::text('variations', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('thanks', 'Agradecimento') !!}
	{!! Form::text('thanks', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>