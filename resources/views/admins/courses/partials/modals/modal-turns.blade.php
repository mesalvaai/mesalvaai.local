<!-- Inicio Modal Turno-->
<div class="modal fade" id="addTurnos" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                       
                {!! Form::open(['route' => ['course-turns.store',$course->id]]) !!}

                @include('admins.courses.partials.form-course_turn', ['some' => 'data'])

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!--Fim Modal turno-->

<!-- Inicio Modal de Modalidades-->
<div class="modal fade" id="addModalidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['course-modality.store',$course->id]]) !!}

                @include('admins.courses.partials.form-course_modality', ['some' => 'data'])

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!--Fim Modal de Modalidades-->

<!-- Inicio Modal de Periodos-->
<div class="modal fade" id="addPeriodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['course-period.store',$course->id]]) !!}

                @include('admins.courses.partials.form-course_period', ['some' => 'data'])

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!--Fim Modal de Periodos-->
