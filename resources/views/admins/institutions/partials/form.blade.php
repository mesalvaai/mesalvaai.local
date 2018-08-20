<div class="row">
	<div class="form-group col">
		{!! Form::label('name', 'Nome') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
       

	<div class="form-group col">
		{!! Form::label('cpnj', 'CNPJ') !!}
		{!! Form::text('cpnj', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('cpe', 'CEP') !!}
		{!! Form::email('cpe', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(75) 00000-0000']) !!}
	</div>
    <div class="form-group">
	{!! Form::label('slug', 'slug') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
</div>



<div class="row">

	<div class="form-group col">
		{!! Form::label('state_id', 'Estado') !!}
		{!! Form::select('state_id', $states, null, ['placeholder' => '-- Selecione um estado --', 'class' => 'form-control']) !!}
	</div>
	<div class="form-group col">
		@if(isset($institution))

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', $cities, null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control']) !!}

		@else

		{!! Form::label('city_id', 'Cidade') !!}
		{!! Form::select('city_id', [], null, ['placeholder' => '-- Antes selecione um estado --', 'class' => 'form-control']) !!}

		@endif
	</div>

	<div class="form-group col">
		{!! Form::label('street', 'Rua') !!}
		{!! Form::text('street', null, ['class' => 'form-control']) !!}
	</div>
        	<div class="form-group col">
		{!! Form::label('number', 'Número') !!}
		{!! Form::text('number', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('neighborhood', 'Bairro') !!}
		{!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('complement', 'Complemento') !!}
		{!! Form::text('complement', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
        <div class="form-group col">
		{!! Form::label('handbag', 'Handbag') !!}
		{!! Form::text('handbag', null, ['class' => 'form-control']) !!}
	</div>
        <div class="form-group col">
		{!! Form::label('logo', 'Logo') !!}
		{!! Form::text('logo', null, ['class' => 'form-control']) !!}
	</div>
        <div class="form-group col">
		{!! Form::label('evaluation', 'Evaluation') !!}
		{!! Form::text('evaluation', null, ['class' => 'form-control']) !!}
	</div>
        <div class="form-group col">
		{!! Form::label('description', 'Descrição') !!}
		{!! Form::text('description', null, ['class' => 'form-control']) !!}
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

<script type="text/javascript">
	
	

	var studentName = "<?php isset($student) ? print "ok" : print "erro" ?>";

	if($('select[name=state_id]').val() != null && institutionName == "erro"){
		
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

