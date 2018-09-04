<div class="form-group">

	{!! Form::label('state_id', 'Em que estado pretende cursar uma faculdade?') !!}

	@if ($errors->has('state_id'))

	{!! Form::select('state_id', $states, null, ['placeholder' => '-- Selecione um Estado --', 'class' => 'form-control is-invalid', 'required']) !!}
	
	<div class="invalid-feedback">
		{{ $errors->first('state_id') }}
	</div>
	
	@else
	
	{!! Form::select('state_id', $states, '29', ['placeholder' => '-- Selecione um Estado --', 'class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="form-group">

	{!! Form::label('city_id', 'E em qual cidade?') !!}

	@if ($errors->has('city_id'))

	{!! Form::select('city_id', [], null, ['placeholder' => '-- Antes Selecione um Estado --', 'class' => 'form-control is-invalid', 'required']) !!}
	
	<div class="invalid-feedback">
		{{ $errors->first('city_id') }}
	</div>
	
	@else
	
	{!! Form::select('city_id', [], null, ['placeholder' => '-- Antes Selecione um Estado --', 'class' => 'form-control', 'required']) !!}

	@endif
</div>


<div class="form-group">

	{!! Form::label('course_id', 'Qual o seu curso?') !!}

	@if ($errors->has('course_id'))

	{!! Form::select('course_id', $courses, null, ['placeholder' => '-- Antes Selecione um Estado --', 'class' => 'form-control is-invalid', 'required']) !!}
	
	<div class="invalid-feedback">
		{{ $errors->first('course_id') }}
	</div>
	
	@else
	
	{!! Form::select('course_id', $courses, null, ['placeholder' => '-- Selecione um Curso --', 'class' => 'form-control', 'required']) !!}

	@endif
</div>

<div class="row">
	<div class="form-group col">
		

		{!! Form::checkbox('presential', true, true, ['class'=> 'form-group']) !!}	


		<b> &nbsp; &nbsp; Presencial</b>
	</div>

	<div class="form-group col">
		
		{!! Form::checkbox('distance', true, true, ['class'=> 'form-group']) !!}	

		<b> &nbsp; &nbsp; A distância</b>
	</div>
</div>


<div class="form-group" align="center">
	{!! Form::submit('Buscar Bolsa', ['class' => 'btn-msa']) !!}
</div>

@section('scripts')

<script type="text/javascript">

	if($('select[name=state_id]').val() != ""){
		buscarCidades();
	}
	
	$('select[name=state_id]').change(function(){

		buscarCidades();
	});

	function buscarCidades(){

		var idEstado = $('select[name=state_id]').val();

	//Add ID do pais do usuário
	//Brasil id = 3469034

	var idPais = '3469034';

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
}

</script>

@endsection