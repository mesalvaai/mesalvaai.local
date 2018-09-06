 <div class="row">
    <div class="form-group col">

        {!! Form::select('state_id', $states, $state_id, ['placeholder' => 'Estado', 'class' => 'form-control']) !!}

    </div>

    <div class="form-group col">


        {{ Form::select('city_id', $cities, null, ['placeholder' => 'Cidade', 'class' => 'form-control']) }}

    </div>


    <div class="form-group col">
        {!! Form::select('level_id', $levels, $level_name, ['placeholder' => 'Nível', 'class' => 'form-control']) !!}

    </div>
    <div class="form-group col">
        {!! Form::select('course_id', $cursos, isset($curso) ? $curso : null, ['placeholder' => 'Curso', 'class' => 'form-control']) !!}

    </div>


</div>
<div class="row">
    <div class="form-group col">

        {!! Form::select('institution_id', $institutions, $state_id, ['placeholder' => 'Instituição', 'class' => 'form-control']) !!}

    </div>

    <div class="form-group col">


        <!-- {-- Form::select('campus', $cities, null, ['placeholder' => 'Cidade', 'class' => 'form-control']) --} -->

    </div>


    <div class="form-group col">
        {!! Form::select('modality_id', $modalities, null, ['placeholder' => 'Modalidade', 'class' => 'form-control']) !!}

    </div>
    <div class="form-group col">
        {!! Form::select('turn_id', $turns, null, ['placeholder' => 'Turno', 'class' => 'form-control']) !!}

    </div>


</div>
<div class="form-group">
    {!! Form::submit('Filtrar', ['class' => 'btn-msa']) !!}
</div>