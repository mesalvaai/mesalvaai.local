@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('content')

<section id="cursos" class="pb-5" style="margin-top: 120px;">
    <div class="container h-100 pt-2">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md justify-content-center">
                <div class="curso-heading col-12 justify-content-center text-center">
                    <h4 class="text-center text-uppercase">Filtros</h4>
                </div>    
            </div>
        </div>
    </div>
    <div class="container border-bottom border-top pb-5 pt-5" align="right">

        {{ Form::open(['route' => 'bolsas.filtra.show.curso', 'method' => 'GET']) }}
        @include('bags.partials.form-filtros')
        {{ Form::close() }}
    </div>

    <div class="container row" align="right">

        @if (session('course'))
        <div class="alert alert-success">
            {{ session('course') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            @endif

        </div>
        <div class="container border-bottom pb-2 pt-2" align="right">
            <a href=""><small>Limpar Filtros</small></a>
        </div>

<!-- 
<div class="container-fluid" align="center">  
    <div align="left">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <h3 class="text-msa">Viu como é simples </h3>
                <p class="text-center text-body pt-1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;Escolha seu curso e faça a sua <b>matrícula</b></p>
            </div>
        </div>
    </div> -->

    <div class="container-fluid"> 

        @if($courses->toArray()['total'] == 0)

        <div  align="center" class="pt-5">

            <h5> :( Ops Nenhum Curso Encontrado!! </h5>
        
        </div>
        @endif

        <div class="row pt-5">
            @foreach($courses as $course)
            <div class="col-xm-12col-sm-6 col-md-3">
                <div class="card pl-2 pr-2 mb-5 shadow">
                    <figure class="figure">
                        <img src="" class="figure-img img-fluid rounded w-50 mx-auto" alt="">
                        <h6 class="text-center text-info mb-5">{{$course->name_course}}</h6>
                        <h6 class="text-body" style="line-height:2px; "><small><b>{{$course->name_level}} / {{ $course->name_type }}</b></small></h6>
                        <h6 class="text-body"  style="line-height:2px;"><small><b>{{$course->name_modality}}</b></small></h6>
                        <h6 class="text-body" style="line-height:2px;"><small><b>{{$course->name_turn}}</b></small></h6>

                        <a href="#" style="background-image: url(/site/img/msa/sec5-3.jpg); }});" class="img-min-campaign float-rigth"></a>
                        <figcaption class="figure-caption text-center text-info"> <a href="#"><u>{{$course->name_institution}}</u></a></figcaption>

                        <hr>

                        @php 

                        $priceAtual =  $course->monthly_payment - ($course->monthly_payment * ($course->discount/100));

                        @endphp
                        <div class="card border-info mb-3">
                            {{-- <div class="card-header">Header</div> --}}
                            <div class="card-body text-info text-center">
                                <p class="card-text text-"><s>de R$ {{ number_format($course->monthly_payment, 2, ',', '.') }} por</s></p>
                                <h5 class="card-title">R$ {{ number_format($priceAtual, 2, ',', '.') }}</h5>
                                <p class="card-text">Bolsa de {{ $course->discount }}%</p>
                            </div>
                        </div>

                        <div align="center">

                           {!! Form::open(['route' => 'bolsas.show.curso']) !!}

                           <input type="hidden" value="{{$course->name_course}}" name="name_course">
                           <input type="hidden" value="{{$course->name_level}}" name="name_level">
                           <input type="hidden" value="{{$course->name_type}}" name="name_type">
                           <input type="hidden" value="{{$course->name_modality}}" name="name_modality">
                           <input type="hidden" value="{{$course->name_turn}}" name="name_turn">
                           <input type="hidden" value="{{$course->name_institution}}" name="name_institution">
                           <input type="hidden" value="{{$course->monthly_payment}}" name="monthly_payment">
                           <input type="hidden" value="{{$course->discount}}" name="discount">
                           <input type="hidden" value="{{$course->duration_course}}" name="duration">
                           <input type="hidden" value="{{$priceAtual}}" name="price_atual">




                           <button title="Buscar Bolsa"  class="btn-msa">Quero esta Bolsa</button>



                           {!! Form::close() !!}
                       </div>
                   </figure>
               </div>
           </div>
           @endforeach
       </div>
       {!! $courses->appends($dataForm)->links() !!}
       <!-- { dd($levels) }} -->
   </div>
</div>
</div>
</section>

@endsection


