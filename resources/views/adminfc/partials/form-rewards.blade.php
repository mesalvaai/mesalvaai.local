<div class="form-group">
	{!! Form::label('title', 'Titulo da objeto a doar*') !!}
	{!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control' , 'required']) !!}
	@if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="row">
	<div class="form-group col-md">
		{!! Form::label('donation', 'Valor a ser doado*') !!}
		{!! Form::text('donation', null, ['class' => $errors->has('donation') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required']) !!}
		@if ($errors->has('donation'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('donation') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group col-md">
		{!! Form::label('quantity', 'Quantidade de recompensas *') !!}
		{!! Form::text('quantity', null, ['class' => $errors->has('quantity') ? 'form-control is-invalid' : 'form-control' , 'rows' => '3', 'required']) !!}
		@if ($errors->has('quantity'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('quantity') }}</strong>
	        </span>
	    @endif
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição da Doação.*') !!}
	{!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'rows' => '3', 'required']) !!}
	@if ($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>



<div class="row">

	<div class="form-group col-md">
		{!! Form::label('unlimited', 'Produtos disponiveis*') !!}
		{!! Form::select('unlimited', ['sim' => 'Limitado', 'nao' => 'Ilimitado'], null, ['class' => $errors->has('unlimited') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('unlimited'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('unlimited') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group col-md">
		{!! Form::label('delivery_date', 'Data da entrega') !!}
		{!! Form::date('delivery_date', \Carbon\Carbon::now(), ['class' => $errors->has('delivery_date') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('delivery_date'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('delivery_date') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group col-md">
		{!! Form::label('delivery_mode', 'Modo da entrega') !!}
		{!! Form::text('delivery_mode', null, ['class' => $errors->has('delivery_mode') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('delivery_mode'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('delivery_mode') }}</strong>
	        </span>
	    @endif
	</div>
</div>

<div class="row">
	<div class="form-group col-md">
		{!! Form::label('variations', 'Variaçao de entrega*') !!}
		{!! Form::select('variations', ['0' => 'Não', '1' => 'Sim'], null, ['class' => $errors->has('variations') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('variations'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('variations') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="form-group col-md">
		{!! Form::label('thanks', 'Agradecimento') !!}
		{!! Form::text('thanks', null, ['class' => $errors->has('thanks') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('thanks'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('thanks') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="form-group col-md">
		{!! Form::label('status', 'Estado *') !!}
		{!! Form::select('status', ['0' => 'Desativado', '1' => 'Ativado'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('status'))
	        <span class="invalid-feedback">
	            <strong>{{ $errors->first('status') }}</strong>
	        </span>
	    @endif
	</div>
</div>

{!! Form::hidden('campaign_id', ($campingId) ? $campingId : session()->get('campaign_id'), ['readonly']) !!}

<div class="form-group text-center pt-5">
	{!! Form::submit('Criar Recompensa', ['class' => 'btn btn-msa btn-sm']) !!}
</div>