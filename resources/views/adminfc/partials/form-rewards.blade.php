<div class="row">
	<div class="form-group col-md">
		<strong>{!! Form::label('title', 'Titulo da recompensa*') !!}</strong>
		{!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control' , 'required']) !!}
		@if ($errors->has('title'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('title') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group col-md">
		<strong>{!! Form::label('donation', 'Valor a ser doado*') !!}</strong>
		{{-- {!! Form::text('donation', null, ['class' => $errors->has('donation') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required']) !!} --}}
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">$R</span>
				<span class="input-group-text">0,00</span>
			</div>
			{!! Form::text('donation', null, ['class' => $errors->has('donation') ? 'form-control is-invalid' : 'form-control', 'data-thousands' => '.', 'data-decimal' => ',', 'required']) !!}
			@if ($errors->has('donation'))
			<span class="invalid-feedback">
				<strong>{{ $errors->first('donation') }}</strong>
			</span>
			@endif
		</div>
		
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
		<strong>{!! Form::label('description', 'Descrição da Doação.*') !!}</strong>
		{!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'rows' => '3', 'required']) !!}
		<small class="text-muted">500/500</small>
		@if ($errors->has('description'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('description') }}</strong>
		</span>
		@endif
	</div>
	
	<div class="form-group col-md-3">
		<strong>{!! Form::label('quantity', 'Quantidade disponível​ *') !!}</strong>
		{!! Form::number('quantity', null, ['class' => $errors->has('quantity') ? 'form-control is-invalid' : 'form-control' , 'placeholder' => '10']) !!}
		@if ($errors->has('quantity'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('quantity') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group col-md-3">
		<div class="form-check form-check-inline pt-4 mt-3">
			{!! Form::checkbox('unlimited','sim',null,['class' => 'form-check-input'])!!}
			<label class="form-check-label pl-2" for="inlineCheckbox1"><strong>Ilimitado *</strong></label>	
		</div>
	</div>
</div>



<div class="row">
	<div class="form-group col-md">
		<strong>{!! Form::label('delivery_date', 'Data estimada da entrega ') !!}</strong>
		{!! Form::text('delivery_date', (isset($reward)) ? FormatTime::FormatDataBR($reward->delivery_date) : FormatTime::FormatDataBR(\Carbon\Carbon::now()), ['class' => $errors->has('delivery_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('delivery_date'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('delivery_date') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group col-md">
		<strong>{!! Form::label('delivery_mode', 'Meios de entrega ') !!}</strong>
		{!! Form::select('delivery_mode', ['' => '--Selecionar--', 'fedex' => 'Fedex', 'virtual' => 'Virtual', 'outros' => 'Outro meio físico'], null, ['class' => $errors->has('delivery_mode') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('delivery_mode'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('delivery_mode') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-md-9">
		<strong>{!! Form::label('variations', 'Essa possui variações? Ex.: Tamanho P, M, G ou Cidade São Paulo, Rio de Janeiro, etc. *') !!}</strong><br>
		<div class="form-check form-check-inline">
			{!! Form::radio('variations', 1, ['class' => 'form-check-input']) !!}
			<label class="form-check-label pl-2" for="inlineRadio1"> Sim</label>
		</div>
		<div class="form-check form-check-inline">
			{!! Form::radio('variations', 0, ['class' => 'form-check-input', 'checked']) !!}
			<label class="form-check-label pl-2" for="inlineRadio2">Não</label>
		</div>
	</div>
	<div class="form-group col-md-3">
		<strong>{!! Form::label('status', 'Estado*') !!}</strong>
		{!! Form::select('status', ['0' => 'Desativado', '1' => 'Ativado'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('status'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('status') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group col-md">
		{!! Form::label('thanks', 'Agradecimento') !!}
		{!! Form::textarea('thanks', 'Valeu! Sua contribuição é muito importante!

		Faz barulho junto com a gente? Se puder enviar essa campanha para seus amigos e familiares, por e-mail, Facebook, Twitter, e nos ajudar a divulgar essa campanha, seremos eternamente gratos! Sozinhos somos um, juntos somos uma multidão! Vamos kickar!', ['class' => $errors->has('thanks') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		<small class="text-muted"><strong>204</strong>/500</small>
		@if ($errors->has('thanks'))
		<span class="invalid-feedback">
			<strong>{{ $errors->first('thanks') }}</strong>
		</span>
		@endif
	</div>
	
</div>

{!! Form::hidden('campaign_id', ($campingId) ? $campingId : session()->get('campaign_id'), ['readonly']) !!}

<div class="row">
	<div class="col-md">
		{{ Form::button('Salvar e criar mais um', ['type' => 'submit', 'name' =>'op', 'value' => 'add_r', 'class' => 'btn btn-success btn-sm w-100'] )  }}
	</div>
	<div class="col-md">
		{{ Form::button('Salvar', ['type' => 'submit', 'name' =>'op', 'value' => 'add', 'class' => 'btn btn-msa btn-sm w-100'] )  }}
	</div>
	<div class="col-md">
		{{ Form::button('Visualizar e lançar seu campanha', ['type' => 'submit', 'name' =>'op', 'value' => 'show_c', 'class' => 'btn btn-info btn-sm w-100'] )  }}
	</div>
</div>