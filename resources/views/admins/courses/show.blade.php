@extends('layouts.painel.master')



@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Curso - </strong>
                    <strong>{{$course->name}}</strong>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>


                    <div class="card-body">
                        @if (session('status'))
                        
                        <div class="alert alert-success">
                            {{ session('status') }}
                            
                            <button id="oi" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                            @endif

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p><strong> Nome: </strong>{{ $course->name }}</p>
                                        <p><strong> Slug: </strong>{{ $course->slug }}</p>
                                        <p><strong> Duração:</strong>{{ $course->duration }}</p>
                                        <p><strong> evalution: </strong>{{ $course->evaluation }}</p>
                                        <p><strong> Abstração:  </strong>{{ $course->abstract }}</p>
                                        <p><strong> Conteúdo: </strong>{{ $course->content }}</p>
                                        <p><strong> Benefíceis: </strong>{{ $course->benefits }}</p>
                                        <p><strong> Status: </strong>{{ $course->status }}</p>
                                        <p><strong> Area: </strong>{{ $course->area->name }}</p>
                                        <p><strong> Nível: </strong>{{ $course->level->name }}</p>
                                    </div>
                                    <div class="col">
                                        @include('admins.courses.partials.blocks')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>





    <!-- Modal  urns-->
    @include('admins.courses.partials.modals.modal-turns')



    @endsection

    @section('scripts')

    


    @if (session('erros_modality'))
        <script>
            $(document).ready(function(){

                $("#addModalidades").modal({show: true});

            });
        </script>
    @endif

    @if (session('erros_turn'))
    <script>
        $(document).ready(function(){

            $("#addTurnos").modal({show: true});

        });
    </script>
    @endif

    @if (session('erros_period'))
    <script>
        $(document).ready(function(){

            $("#addPeriodos").modal({show: true});

        });
    </script>
    @endif

    <script>



        function MostBloco(evt, stat) {


            var i, tabcontent, tablinks;

            var display = document.getElementById(stat).style.display;


            if(display == "none"){
                document.getElementById(stat).style.display = 'block';
            }
            else{
                document.getElementById(stat).style.display = 'none';
            }

            tabcontent = document.getElementsByClassName("form");

            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("nav-link");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            evt.currentTarget.className += " active";
            document.getElementById(stat).style.display = "block";
        }



    </script>
    @endsection

