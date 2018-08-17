<style>
.tab {
	overflow: hidden;
	border: 1px solid #ccc;
	background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
	background-color: inherit;
	float: left;
	border: none;
	outline: none;
	cursor: pointer;
	padding: 14px 16px;
	transition: 0.3s;
	font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
	background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
	background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
	display: none;
	padding: 6px 12px;
	border: 1px solid #ccc;
	border-top: none;
}
</style>

{{-- {!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!} --}}
<div class="form-group row">
    {!! Form::label('full_name', 'Nome completo', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-9">
      	{!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('full_name'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('full_name') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('email', 'E-mail', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-9">
      	{!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('email'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('email') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('data_of_birth', 'E-mail', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::date('data_of_birth', null, ['class' => $errors->has('data_of_birth') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('data_of_birth'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('data_of_birth') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('celular', 'Celular', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::text('celular', null, ['class' => $errors->has('celular') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('celular'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('celular') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('cpf', 'CPF', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::text('cpf', null, ['class' => $errors->has('cpf') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('cpf'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('cpf') }}</strong>
        	</span>
    	@endif
    </div>
</div>


<div class="form-group row">
	{!! Form::label('title', 'Valor', ['class' => 'col-sm-3 col-form-label']) !!}

	<div class="input-group col-md-4">
		<div class="input-group-prepend">
			<span class="input-group-text">$R</span>
			<span class="input-group-text">0.00</span>
		</div>
		{!! Form::text('total_amount', null, ['class' => $errors->has('total_amount') ? 'form-control is-invalid' : 'form-control','id' => 'total_amount', 'required']) !!}
		<small class="text-warning">(mínimo de R$20,00) </small>
	</div>
	
	@if ($errors->has('total_amount'))
	<span class="invalid-feedback">
		<strong>{{ $errors->first('total_amount') }}</strong>
	</span>
	@endif
</div>

<h3>Meios de Pagamentos</h3>
<div class="row" >
	
	<div class="col-6" align="center" >
		
		{!! Form::radio('tipo-pagamento',null, null, ['onclick' => 'openCity(event, "cred-card")']) !!}
		{!! Form::label('tipo-pagamento', 'Cartão de crédito') !!}
		<br>
		<img src="\site\img\donations\cartao.png"  width= "160" height= "100">

	</div>
	
	<div class="col-6" align="center">
		{!! Form::radio('tipo-pagamento', null, null,['onclick' => 'openCity(event, "boleto")']) !!}
		{!! Form::label('tipo-pagamento', 'Boleto') !!}
		<br>
		<img src="\site\img\donations\boleto.png">

	</div>
</div>
<div id="cred-card" class="tabcontent">
	<div class="form-group row">
	    {!! Form::label('card_number', 'Número do cartão:', ['class' => 'col-sm-3 col-form-label'] ) !!}
	    <div class="col-sm-9">
	      	{!! Form::text('card_number', null, ['class' => $errors->has('card_number') ? 'form-control is-invalid' : 'form-control']) !!}
	      	@if ($errors->has('card_number'))
	        	<span class="invalid-feedback" style="display: block;">
	            	<strong>{{ $errors->first('card_number') }}</strong>
	        	</span>
	    	@endif
	    </div>
	</div>
	<div class="form-group row">
	    {!! Form::label('card_name', 'Nome do Titular:', ['class' => 'col-sm-3 col-form-label'] ) !!}
	    <div class="col-sm-9">
	      	{!! Form::text('card_name', null, ['class' => $errors->has('card_name') ? 'form-control is-invalid' : 'form-control']) !!}
	      	@if ($errors->has('card_name'))
	        	<span class="invalid-feedback" style="display: block;">
	            	<strong>{{ $errors->first('card_name') }}</strong>
	        	</span>
	    	@endif
	    </div>
	</div>
	<?php  $mes = [''=>'',1=>1, 2 =>2, 3 =>3, 4 =>4, 5 =>5, 6 =>6, 7 =>7, 8 =>8, 9 =>9, 10 =>10, 11 =>11, 12 =>12] ?>
	<?php  $dia = [''=>'',1=>1, 2 =>2, 3 =>3, 4 =>4, 5 =>5, 6 =>6, 7 =>7, 8 =>8, 9 =>9, 10 =>10, 11 =>11, 12 =>12, 13 =>13, 14 =>14,
					15 =>15, 16 =>16, 17 =>17, 18 =>18, 19 =>19, 20 =>20, 21 =>21, 22 =>22, 23 =>23, 24 =>24, 25 =>25, 26 =>26, 27 =>27,
					28 =>28, 29 =>29, 30 =>30, 31 =>31] ?>
	<div class="form-group row">
		{!! Form::label('card_expiration', 'Validade:', ['class' => 'col-sm-3 col-form-label'] ) !!}
		<div class="col-sm-9 row">
			<div class="form-group col-xs-12 col-md-6">
				{!! Form::label('mes', 'Mês') !!}
				{!! Form::select('mes', $mes, null, ['class' => 'form-control', 'placeholder' => '00', 'required']) !!}
			</div>
			<div class="form-group col-xs-12 col-md-6">
				{!! Form::label('dia', 'Dia') !!}
				{!! Form::select('dia', $dia, null, ['class' => 'form-control', 'placeholder' => '00', 'required']) !!}
			</div>
		</div>
	</div>

	<div class="form-group row">
	    {!! Form::label('card_cvc', 'Código de segurança: ', ['class' => 'col-sm-3 col-form-label'] ) !!}
	    <div class="col-sm-9">
	      	{!! Form::text('card_cvc', null, ['class' => $errors->has('card_cvc') ? 'form-control is-invalid' : 'form-control']) !!}
	      	@if ($errors->has('card_cvc'))
	        	<span class="invalid-feedback" style="display: block;">
	            	<strong>{{ $errors->first('card_cvc') }}</strong>
	        	</span>
	    	@endif
	    </div>
	</div>
</div>

<br>

<div class="row">{{-- 
	<div class="col-md">
		{{ Form::button('Aicionar recompensas (opcional)', ['type' => 'submit', 'name' =>'op', 'value' => 'add_r', 'class' => 'btn btn-success btn-sm w-100'] )  }}
	</div> --}}
	<div class="col-md">
		{{ Form::button('CONTINUAR', ['type' => 'submit', 'name' =>'op', 'value' => 'add', 'class' => 'btn btn-msa btn-sm w-100'] )  }}
	</div>{{-- 
	<div class="col-md">
		{{ Form::button('Visualizar e lançar seu campanha', ['type' => 'submit', 'name' =>'op', 'value' => 'show_c', 'class' => 'btn btn-info btn-sm w-100'] )  }}
	</div> --}}
</div>

@section('scripts')
<script src="{{ asset('site/js/jquery.mask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('site//lib/maskMoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>
<script>
	
	(function( $ ) {
    	$(function() {
			$("#total_amount").maskMoney();
			$("#card_number").mask("0000 0000 0000 0000");
			$("#card_cvc").mask("000");
		});
	})(jQuery);
</script>

<script>
	function openCity(evt, optionPayment) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(optionPayment).style.display = "block";
		evt.currentTarget.className += " active";
	}

</script>


@endsection

