@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('content')
<!-- <section id="painel-fc" class="painel-fc">
    <div class="painel-fc-bg">
        <div class="container text-center">
            <h1 class="text-white">O fim da complexidade</h1>
        </div>
    </div>
</section> -->
<section class="pb-5" style="margin-top: 120px;">
    <div class="container" align="center">  
        <div class="col-md-6" align="left">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-msa">Graduação</h3>
                </div>
                <div class="card-body">
                    <h2 class="text-center text-msa">Viu como é simples</h2>
                    <p class="text-center" style="color: #000">Basta escolher seu curso, instituição e pagar a primeira mensalidade e vó alá, divirta-se até o final do curso</p>

                    {{ Form::open(['route' => 'bolsas.resultado', 'method' => 'GET']) }}
                    @include('bags.partials.form')
                    {{ Form::close() }}

                    
                </div>
            </div>

        </div>
    </div>
</section>
@endsection