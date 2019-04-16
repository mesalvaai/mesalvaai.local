 <div class="row">
    <div class="form-group col">

        {!! Form::select('state_id', $states, $state_id, ['placeholder' => 'Estado', 'class' => 'form-control']) !!}

    </div>

    <div class="form-group col">


        {{ Form::select('city_id', $cities, isset($city_id) ? $city_id : null, ['placeholder' => 'Cidade', 'class' => 'form-control']) }}

    </div>


    <div class="form-group col">
        {!! Form::select('level_id', [], null, ['placeholder' => 'Nível', 'class' => 'form-control']) !!}

    </div>

    <div class="form-group col">
        {!! Form::select('course_id', [], null, ['placeholder' => 'Curso', 'class' => 'form-control']) !!}

    </div>

</div>
<div class="row">
    <div class="form-group col">

        {!! Form::select('institution_id', [], $state_id, ['placeholder' => 'Instituição', 'class' => 'form-control']) !!}

    </div>

    <div class="form-group col">


        <!-- {-- Form::select('campus', $cities, null, ['placeholder' => 'Cidade', 'class' => 'form-control']) --} -->

    </div>


    <div class="form-group col">
        {!! Form::select('modality_id', [], null, ['placeholder' => 'Modalidade', 'class' => 'form-control']) !!}

    </div>
    <div class="form-group col">
        {!! Form::select('turn_id', [], null, ['placeholder' => 'Turno', 'class' => 'form-control']) !!}

    </div>


</div>
<div class="form-group">
    {!! Form::submit('Filtrar', ['class' => 'btn-msa']) !!}
</div>

@section('scripts')
<script type="text/javascript">

    $.get('/preencheForm/', function(arrays){



      var levels = arrays[0];
      var cursos = arrays[1];
      var institutions = arrays[2];
      var modalities = arrays[3];
      var turns = arrays[4];


            // $('select[name=city_id]').prop("disabled", false);
    // $('select[name=city_id]').empty();

    // $('select[name=level_id]').empty();
    // $('select[name=course_id]').empty();
    // $('select[name=institution_id]').empty();
    // $('select[name=modality_id]').empty();
    // $('select[name=turn_id]').empty();



    // $('select[name=level_id]').append('<option placeholder> Nível </option>');
    // $('select[name=course_id]').append('<option placeholder> Curso </option>');
    // $('select[name=institution_id]').append('<option placeholder> Instituição </option>');
    // $('select[name=modality_id]').append('<option placeholder> Modalidade </option>');
    // $('select[name=turn_id]').append('<option placeholder> Turno </option>');




    $.each(levels, function(key, value) {
        $('select[name=level_id]').append('<option value = ' + key + '>' + value + '</option>');
    });


    $.each(cursos, function(key, value) {
        $('select[name=course_id]').append('<option value = ' + key + '>' + value + '</option>');
    });
    
    $.each(institutions, function(key, value) {
        $('select[name=institution_id]').append('<option value = ' + key + '>' + value + '</option>');
    });

    $.each(modalities, function(key, value) {
        $('select[name=modality_id]').append('<option value = ' + key + '>' + value + '</option>');
    });

    $.each(turns, function(key, value) {
        $('select[name=turn_id]').append('<option value = ' + key + '>' + value + '</option>');
    });


    var city_id = "<?php print isset($city_id) ? $city_id : null; ?>";
    var level_id = "<?php print $level_id; ?>";
    var course_id = "<?php print $course_id; ?>";

    var institution_id = "<?php  print isset($institution_id) ?  $institution_id : null; ?>";
    var modality_id = "<?php print isset($modality_id) ? $modality_id : null; ?>";
    var turn_id = "<?php print isset($turn_id) ?  $turn_id : null; ?>";




    if(course_id != "")
        $('select[name=course_id]').val(course_id);


    if(level_id != "")
        $('select[name=level_id]').val(level_id);

    if(institution_id != "")
        $('select[name=institution_id]').val(institution_id);


    if(modality_id != "")
        $('select[name=modality_id]').val(modality_id);


    if(turn_id != "")
        $('select[name=turn_id]').val(turn_id);


});

</script>

@endsection