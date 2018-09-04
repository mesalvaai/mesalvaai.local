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
{!! Form::hidden('campaign_id', $campanha->id) !!}
<div class="form-group row">
	{!! Form::label('full_name', 'Nome completo', ['class' => 'col-sm-3 col-form-label'] ) !!}
	<div class="col-sm-9">
		{!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
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
		{!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('email'))
		<span class="invalid-feedback" style="display: block;">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row">
	{!! Form::label('date_of_birth', 'Data de nascimento', ['class' => 'col-sm-3 col-form-label'] ) !!}
	<div class="col-sm-4">
		{!! Form::text('date_of_birth', null, ['class' => $errors->has('date_of_birth') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'DD/MM/AAAA', 'required']) !!}
		@if ($errors->has('date_of_birth'))
		<span class="invalid-feedback" style="display: block;">
			<strong>{{ $errors->first('date_of_birth') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row">
	{!! Form::label('phone', 'phone', ['class' => 'col-sm-3 col-form-label'] ) !!}
	<div class="col-sm-4">
		{!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
		@if ($errors->has('phone'))
		<span class="invalid-feedback" style="display: block;">
			<strong>{{ $errors->first('phone') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row">
	{!! Form::label('cpf', 'CPF', ['class' => 'col-sm-3 col-form-label'] ) !!}
	<div class="col-sm-4">
		{!! Form::text('cpf', null, ['class' => $errors->has('cpf') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
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
			<span class="input-group-text">0,00</span>
		</div>
		{!! Form::text('total_amount', null, ['class' => $errors->has('total_amount') ? 'form-control is-invalid' : 'form-control','id' => 'total_amount', 'required']) !!}
		<small class="text-warning">(mínimo de R$20,00) </small>
		@if ($errors->has('total_amount'))
			<span class="invalid-feedback">
				<strong>{{ $errors->first('total_amount') }}</strong>
			</span>
		@endif
	</div>
	
	
</div>

<h3>Meios de Pagamentos</h3>
<div class="row" >
	
	<div class="col-6" align="center" >
		
		{!! Form::radio('type_payment','CREDIT_CARD', null, ['onclick' => 'openMethodPago(event, "cred-card")']) !!}
		{!! Form::label('type_payment', 'Cartão de crédito') !!}
		<br>
		<img src="{{ asset('site/img/donations/cartao.png') }}"  width= "160" height= "100">

	</div>
	
	<div class="col-6" align="center">
		{!! Form::radio('type_payment', 'BOLETO', null,['onclick' => 'openMethodPago(event, "boleto")']) !!}
		{!! Form::label('type_payment', 'Boleto') !!}
		<br>
		<img src="{{ asset('site/img/donations/boleto.png') }}">

	</div>
</div>
<div id="cred-card" class="tabcontent">
	<div class="form-group row">
		{!! Form::label('card_number', 'Número do cartão:', ['class' => 'col-sm-3 col-form-label'] ) !!}
		<div class="col-sm-9">
			{!! Form::text('card_number', null, ['class' => $errors->has('card_number') ? 'form-control is-invalid' : 'form-control', 'id' => 'number']) !!}
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
	<div class="form-group row">
		{!! Form::label('card_cvc', 'Código de segurança: ', ['class' => 'col-sm-3 col-form-label'] ) !!}
		<div class="col-sm-9">
			{!! Form::text('card_cvc', null, ['class' => $errors->has('card_cvc') ? 'form-control is-invalid' : 'form-control', 'id' => 'card_cvc']) !!}
			@if ($errors->has('card_cvc'))
			<span class="invalid-feedback" style="display: block;">
				<strong>{{ $errors->first('card_cvc') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<?php  $mes = ['01'=>'Janeiro', '02' =>'Fevereiro', '03' =>'Março', '04' =>'Abril', '05' =>'Maio', '06' =>'Junho', '07' =>'Julho', '08' =>'Agosto', '09' =>'Setembro', '10' =>'Outubro', '11' =>'Novembro', '12' =>'Dezembro'] ?>
	<?php  $ano = [''=>'',18=>18, 19 =>19, 20 =>20, 22 =>22, 23 =>23, 24 =>24, 25 =>25, 26 =>26, 27 =>27, 28 =>28, 29 =>29, 30 =>30] ?>
	<div class="form-group row">
		{!! Form::label('card_expiration', 'Validade:', ['class' => 'col-sm-3 col-form-label'] ) !!}
		<div class="col-sm-9 row">
			<div class="form-group col-xs-12 col-md-6">
				{!! Form::label('month', 'Mês') !!}
				{!! Form::select('month', $mes, null, ['class' => $errors->has('year') ? 'form-control is-invalid' : 'form-control', 'placeholder' => '-- Selecione um mês --', 'id' => 'month']) !!}
				@if ($errors->has('month'))
					<span class="invalid-feedback" style="display: block;">
						<strong>{{ $errors->first('month') }}</strong>
					</span>
				@endif
			</div>
			<div class="form-group col-xs-12 col-md-6">
				{!! Form::label('year', 'Ano') !!}
				{!! Form::select('year', $ano, null, ['class' => $errors->has('year') ? 'form-control is-invalid' : 'form-control', 'placeholder' => '00', 'id' => 'year']) !!}
				@if ($errors->has('year'))
					<span class="invalid-feedback" style="display: block;">
						<strong>{{ $errors->first('year') }}</strong>
					</span>
				@endif
			</div>
		</div>
	</div>
	<textarea name="keyMoip" id="encrypted_value" style="display: none;"></textarea>
	<div class="col-md">
		{{ Form::button('CONTRIBUIR', ['type' => 'submit', 'name' =>'op', 'value' => 'CREDIT_CARD', 'class' => 'btn btn-msa btn-sm w-100', 'id' => 'encrypt'] )  }}
	</div>
</div>

<div id="boleto" class="tabcontent">
	{{ Form::button('GERAR BOLETO', ['type' => 'submit','name' =>'op', 'value' => 'BOLETO', 'class' => 'btn btn-msa btn-sm w-100', 'id' => 'gerar_boleto'] )  }}
</div>

<br>

@section('scripts')
<!-- JavaScript do moip -->
<script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>

<script src="{{ asset('site/js/jquery.mask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('site//lib/maskMoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>
<script>
	
	(function( $ ) {
		$(function() {
			$("#phone").mask("(99) 999999999");
			$("#cpf").mask("000.000.000-00");
			//$("#total_amount").maskMoney();
			$("#total_amount").maskMoney({thousands:".", decimal:",", symbol:"R$", showSymbol:true, symbolStay:true});
			$("#number").mask("0000 0000 0000 0000");
			$("#card_cvc").mask("000");
			$("#date_of_birth").mask("00/00/0000");
		});
	})(jQuery);
</script>

<script>
	function openMethodPago(evt, optionPayment) {
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

<script type="text/javascript" language="javascript">
	var key = "-----BEGIN PUBLIC KEY-----"+
	 "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4UDKQUT5lrZdSeE6d/Tu"+
	 "AnYAV8H0FjwT3+0AAIoo3bwekxvkLjn9AjQ+25IIEOe2Q5h4KWf8Apa4KA69S58T"+
	 "R32FSJofl3S6TS9F/bZSYfZXwizcdfJhOl3aIbtFRQ3/B6Pa3Bg0Z/bofN02cy5T"+
	 "SxY3+wAqORYChhMNS+NQT68NVIgk2mYJU9Le+a/lj8IwVDEAoy0N5jsox8PPfe0a"+
	 "kU1cTtx7TWOVSBTJC9l/GbT/CvKGcj2MO824ShYozW/4bx3yeaAIzBl8VgQMnph3"+
	 "v8pYTtQJjhQ7N6GwMu7mRoYkwYVNUgxgJocIcnKfXym5Ij95aJw8WyfzgxvkSdNh"+
	 "2wIDAQAB"+
	 "-----END PUBLIC KEY-----";

	$(document).ready(function() {

	  	$("#encrypt").click(function() {
		    var cc = new Moip.CreditCard({
		      	number  : $("#number").val(),
		      	cvc     : $("#cvc").val(),
		      	expMonth: $("#month").val(),
		      	expYear : $("#year").val(),
		      	pubKey  : key
		    });
		    console.log(cc);
		    if( cc.isValid()){
		      	$("#encrypted_value").val(cc.hash());
		    }
		    else{
		      	$("#encrypted_value").val('');
		      	alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
		    }

		    var hash = $("#encrypted_value").val();
		   	var base64 = btoa(hash);
		   	//  location.href = '/campanhas/processar-donacao/' + base64; 
		  	// });

		   	// pegando os dados 
		   	//var vHash = $("#encrypted_value").val();
		   	var vHash = base64;
		   	// criando as variáveis 
		   	var vUrl = "/campanhas/processar-donacao"; 
		   	var vData = { nome:vHash };

		   	$.post( 
		   		vUrl, //Required URL of the page on server v
		   		Data, 
		   		function(response,status) { 
		   			// tratando o status de retorno. Sucesso significa que o envio e retorno foi executado com sucesso. 
		   			if(status == "success") {
		   				// pegando os dados jSON 
		   				// var obj = jQuery.parseJSON(response); 
		   				// $("#result").html( 
		   				// 	"Nome enviado: " + obj.nome + "<br>" + 
		   				// 	"E-mail enviado: " + obj.email 
		   				// ); 
		   			} 
		   		}
		   	);
		});
});
</script>

@endsection

