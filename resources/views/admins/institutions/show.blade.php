@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <strong>Instituição</strong>
                    <a href="{{ route('institutions.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $institutions->id }}</p>
                    <p><strong>Nome: </strong>{{ $institutions->name }}</p>
                    <p><strong>CNPJ: </strong>{{ $institutions>cpnj }}</p>
                    <p><strong>CEP: </strong>{{ $institutions->cpe }}</p>
                    
                    <p><strong>Telefone: </strong>{{ $institutions->phone }}</p>
                    <p><strong>Slug: </strong>{{ $institutions->slug }}</p>
                    <p><strong>Estado: </strong>{{ $stateName }}</p>
                    <p><strong>Cidade: </strong>{{ $cityName }}</p>
                    <p><strong>Rua: </strong>{{ $institutions->street }}</p>
                    <p><strong>Número: </strong>{{ $institutions->number }}</p>
                    <p><strong>Bairro: </strong>{{ $institutions->neighborhood }}</p>
                    <p><strong>Complemento: </strong>{{ $institutions>complement }}</p>
                    <p><strong>Handbag: </strong>{{ $institutions>handbag }}</p>
                    <p><strong>Logo: </strong>{{ $institutions>logo }}</p>
                    <p><strong>Evaluation: </strong>{{ $institutions>evaluation}}</p>
                    <p><strong>Descrição: </strong>{{ $institutions>description }}</p>
                    <p><strong>Status: </strong>{{ ($institutions->status == 1) ? 'Ativo' : 'Inativo' }}</p>

                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
