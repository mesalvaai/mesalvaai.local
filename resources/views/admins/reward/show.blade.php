@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   
                    <strong>Recompensa de {{ $reward->name }}</strong>
                    <strong></strong>
                    <a href="{{ route('rewards.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $reward->id }}</p>
                    <p><strong>Id Usuario: </strong>{{ $reward->user_id }}</p>
                    <p><strong>Nome do Usuario: </strong>{{ $reward->name }}</p>
                    <p><strong>Id da Campanha: </strong>{{ $reward->campaign_id }}</p>
                    <p><strong>Titulo: </strong>{{ $reward->title }}</p>
                    <p><strong>Doação: </strong>{{ $reward->donation }}</p>
                    <p><strong>Descrição: </strong>{{ $reward->description }}</p>
                    <p><strong>Quantidade: </strong>{{ $reward->quantity }}</p>
                    <p><strong>Ilimitado: </strong>{{ $reward->unlimited }}</p>
                    <p><strong>Data da entrega: </strong>{{ $reward->delivery_date }}</p>
                    <p><strong>Modo de entrega: </strong>{{ $reward->delivery_mode }}</p>
                    <p><strong>Variações: </strong>{{ ($reward->variations == 1 ? 'Sim' : 'Não') }}</p>
                    <p><strong>Agradecimento: </strong>{{ $reward->thanks }}</p>
                    <p><strong>Criado em: </strong>{{ $reward->created_at }}</p>
                    <p><strong>Atualizado em: </strong>{{ $reward->updated_at }}</p>
                    

                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
