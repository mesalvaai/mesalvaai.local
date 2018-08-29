@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <strong>Costs</strong>
                    <a href="{{ route('costs.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $costs->id }}</p>
                    <p><strong>Pagamento Mensal: </strong>{{ $costs->monthly_payment }}</p>
                    <p><strong>Desconto: </strong>{{ $costs->discount }}</p>
                    <p><strong>Bolsa de Estudos: </strong>{{ $costs->scholarship }}</p>
                    <p><strong>Economia: </strong>{{ $costs->economy }}</p>
                    <p><strong>Vaga: </strong>{{ $costs->vacancy }}</p>
                    <p><strong>Status: </strong>{{ $costs->status }}</p>
                    <p><strong>Curso: </strong>{{ $costs->course_id }}</p>
                    <p><strong>Período: </strong>{{ $costs->periods_id }}</p>
                    <p><strong>Nível: </strong>{{ $costs->level_id }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
