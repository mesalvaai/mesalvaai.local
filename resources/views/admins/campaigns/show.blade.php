@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Categoria - </strong>
                    <strong>{{$campaign->title}}</strong>
                    <a href="{{ route('campaigns.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><strong>Id: </strong>{{ $campaign->id }}</p>
                    <p><strong>Objetivo: </strong>{{ $campaign->goal }}</p>
                    <p><strong>Fundos recebidos: </strong>{{ $campaign->funds_received }}</p>
                    <p><strong>Data de início:</strong>{{ $campaign->start_date }}</p>
                    <p><strong>Fim da campanha: </strong>{{ $campaign->end_date }}</p>
                    <p><strong>Descrição da campanha:  </strong>{{ $campaign->description }}</p>
                    <p><strong>Localização: </strong>{{ $campaign->location }}</p>
                    <p><strong>Categoria: </strong>{{ $campaign->category_id }}</p>
                    <p><strong>Status: </strong>{{ ($campaign->status == 1) ? 'Ativo' : 'Inativo' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
