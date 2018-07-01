@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <strong>Doação de {{$donation->full_name}}</strong>
                    <strong>Doações</strong>
                    <a href="{{ route('donations.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $donation->id }}</p>
                    <p><strong>Nome: </strong>{{ $donation->full_name }}</p>
                    <p><strong>Email: </strong>{{ $donation->email }}</p>
                    <p><strong>Detalhes: </strong>{{ $donation->details }}</p>
                    <p><strong>Data da doação: </strong>{{ $donation->donation_date }}</p>
                    <p><strong>Cep: </strong>{{ $donation->postal_code }}</p>
                    <p><strong>Valor total: </strong>{{ $donation->total_amount }}</p>
                    <p><strong>Pais: </strong>{{ $donation->country }}</p>
                    <p><strong>Status: </strong>{{ ($donation->status == 1) ? 'Ativo' : 'Inativo' }}</p>

                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
