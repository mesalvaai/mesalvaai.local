<div class="row">
	<div class="form-group col">
		{!! Form::label('name', 'Nome Completo') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('cpf', 'CPF') !!}
		{!! Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('data_of_birth', 'Data de Nascimento') !!}
		{{-- {!! Form::date('data_of_birth', null, ['class' => 'form-control']) !!} --}}
		{!! Form::date('data_of_birth', \Carbon\Carbon::now(),['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(75) 00000-0000', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('cep', 'CEP') !!}
		{!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => '00000-000', 'required']) !!}
	</div>
</div>

{!! Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control', 'required']) !!}

<div class="row">
	<div class="form-group col">
		@if(isset($student))

		{!! Form::label('country_id', 'País') !!}
		{!! Form::select('country_id', $countries, null, ['placeholder' => '-- Selecione um Pais --', 'class' => 'form-control', 'required']) !!}

		@else

		{!! Form::label('country_id', 'País') !!}
		{!! Form::select('country_id', $countries, $idPais, ['placeholder' => '-- Selecione um Pais --', 'class' => 'form-control', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('state_id', 'Estado') !!}
		{!! Form::select('state_id',$states, null, ['placeholder' => '-- Selecione um estado --', 'class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col">
		@if(isset($student))

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', $cities, null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control', 'required']) !!}

		@else

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', [], null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control', 'required']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('street', 'Rua') !!}
		{!! Form::text('street', null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('number', 'Número') !!}
		{!! Form::text('number', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('neighborhood', 'Bairro') !!}
		{!! Form::text('neighborhood', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('complement', 'Complemento') !!}
		{!! Form::text('complement', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-md-2">
		{!! Form::label('status', 'Situação') !!}
		{!! Form::select('status', [''=> 'Selecione','0' => 'Inativo', '1' => 'Ativo'], null, ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>

@php

$countries_json = json_encode($countries);

@endphp

@section('scripts')
<script src="{{ asset('site/js/jquery.mask.min.js') }}" type="text/javascript"></script>
<script>
	(function( $ ) {
		$(function() {
			$("#phone").mask("(99) 999999999");
			$("#cpf").mask("000.000.000-00");
		});
	})(jQuery);
</script>

<script type="text/javascript">
	
	//Caso dê erro no cadastro e a página retorne ao form e caso não exista uma variável student pois ai estrá na pagina de edit

	var studentName = "<?php isset($student) ? print "ok" : print "erro" ?>";

	if($('select[name=state_id]').val() != null && studentName == "erro"){
		
		var idEstado = $('select[name=state_id]').val();

		var idPais = $('select[name=country_id]').val();

		$.get('/get-cidades/'  + idPais + '/' +  idEstado, function(cities){

			// $('select[name=city_id]').prop("disabled", false);
			
			$('select[name=city_id]').empty();

			$('select[name=city_id]').append('<option placeholder> -- Selecione uma Cidade -- </option>');

			$.each(cities, function(key, value) {

				$('select[name=city_id]').append('<option value = ' + key + '>' + value + '</option>');
			});
		});
	}
//


// $(document).ready(function() {

// 	$.get('/get-paises-restantes', function(countries){

// 		$.each(countries, function(key, value) {

// 			$('select[name=country_id]').append('<option value = ' + key + '>' + value + '</option>');
// 		});
// 	});
// })


$('select[name=state_id]').change(function(){

	var idEstado = $(this).val();

	var idPais = $('select[name=country_id]').val();

	$('select[name=city_id]').empty();

	$('select[name=city_id]').append('<option placeholder> Carregando... </option>');

	$.get('/get-cidades/'  + idPais + '/' +  idEstado, function(cities){

			// $('select[name=city_id]').prop("disabled", false);

			$('select[name=city_id]').empty();

			$('select[name=city_id]').append('<option placeholder> -- Selecione uma Cidade -- </option>');

			$.each(cities, function(key, value) {

				$('select[name=city_id]').append('<option value = ' + key + '>' + value + '</option>');
			});
		});
});


$('select[name=country_id]').change(function(){

	var idPais = $(this).val();

	$('select[name=state_id]').empty();
	$('select[name=city_id]').empty();

	$('select[name=state_id]').append('<option placeholder> Carregando... </option>');
	$('select[name=city_id]').append('<option placeholder> -- Antes selecione um estado -- </option>');

	$.get('/get-estados/' + idPais, function(states){

		$('select[name=state_id]').empty();

		$('select[name=state_id]').append('<option placeholder> -- Selecione um estado -- </option>');

		$.each(states, function(key, value) {

			$('select[name=state_id]').append('<option value = ' + key + '>' + value + '</option>');
		});
	});
});

</script>

@endsection