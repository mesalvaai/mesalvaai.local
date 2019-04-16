
@extends('layouts.site.appfc')
 
@section('content')

{{-- <section id="painel-fc" class="painel-fc">
    <div class="painel-fc-bg">
        <div class="container text-center">
            <h1 class="text-white">INSCREVA SEU PROJETO</h1>
        </div>
    </div>
</section> --}}

<section class="painel-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-msa">Sobre você</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        @endif
                        
                         @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        
                        {!! Form::model($student, ['route' => ['update.student', $student->id], 'method' => 'PUT']) !!}
                            @include('adminfc.partials.edit-student')
                        {{ Form::close() }}
                                           
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('site/js/jquery.mask.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>
    <script src="{{ asset('site/js/validacoes.js') }}" type="text/javascript" charset="utf-8" async defer></script>

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

    //  $.get('/get-paises-restantes', function(countries){

    //      $.each(countries, function(key, value) {

    //          $('select[name=country_id]').append('<option value = ' + key + '>' + value + '</option>');
    //      });
    //  });
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