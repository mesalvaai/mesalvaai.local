<!--Inicio cabeçalho do Bloco-->

<div class="card text-center text-secondary">
    <div class="card-header bg-light border rounded border-bottom-0">
        <strong> Curso de {{$course->name}}</strong>

    </div>

    <div class="card-header bg-light border rounded border-bottom-0">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link border-bottom-0 rounded active" onclick="MostBloco(event, 'Active')" href="#">Turnos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom-0 rounded" onclick="MostBloco(event, 'Link')" href="#">Modalidades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom-0 rounded" onclick="MostBloco(event, 'Disabled')" href="#">Periodos</a>
            </li>
        </ul>
    </div>
    <!--Fim do cabeçalho do Bloco-->

    <div class=" border rounded border-top-0">

        <div class="form" id="Active" style="margin: 20px">
            <table class="card" style="margin: 10px">
                @if(empty($course_turns->get(0)))
                <li class="list-group-item">Não há turnos cadastradas</li>

                @else
                @foreach ($course_turns as $course_turn)
                <tr class="list-group-item" style="width: 100%">
                    <td style="width: 90%">
                        {{$course_turn->name}}
                    </td>
                    <td style="width: 10%">
                        {!! Form::open(['route' => ['course-turns.destroy', $course_turn->id] , 'method' => 'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </table>

            <button type="button" class="btn btn-outline-dark rounded" data-toggle="modal" data-target="#addTurnos"><i class="fa fa-plus"></i> Turnos</button>

        </div>

        <div class="form" id="Link" style="display: none; margin: 20px">
            <table class="card" style="margin: 10px">
                @if(empty($course_modalities->get(0)))
                <li class="list-group-item">Não há modalidades cadastradas</li>

                @else
                @foreach ($course_modalities as $course_modality)
                <tr class="list-group-item" style="width: 100%">
                    <td style="width: 90%">
                        {{$course_modality->name}}
                    </td>
                    <td style="width: 10%">
                        {!! Form::open(['route' => ['course-modality.destroy', $course_modality->id] , 'method' => 'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </table>

            <button type="button" class="btn btn-outline-dark rounded" data-toggle="modal" data-target="#addModalidades"><i class="fa fa-plus"></i> Modalidades</button>

        </div>

        <div class="form" id="Disabled" style="display: none; margin:20px">
            <table class="card" style="margin: 10px">
                @if(empty($course_periods->get(0)))
                <li class="list-group-item">Não há periodos cadastradas</li>

                @else
                @foreach ($course_periods as $course_period)
                <tr class="list-group-item" style="width: 100%">
                    <td style="width: 90%">
                        {{$course_period->name}}
                    </td>
                    <td style="width: 10%">
                        {!! Form::open(['route' => ['course-period.destroy', $course_period->id] , 'method' => 'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </table>

            <button type="button" class="btn btn-outline-dark rounded" data-toggle="modal" data-target="#addPeriodos"><i class="fa fa-plus"></i> Periodos</button>

        </div>
    </div>
</div>