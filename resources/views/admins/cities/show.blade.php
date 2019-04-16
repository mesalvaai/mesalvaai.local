@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Cidade - </strong>
                    <strong>{{$city->name}}</strong>

                    <a href="{{ route('cities.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><strong>ID: </strong>{{ $city->id }}</p>
                    <p><strong>Nome: </strong>{{ $city->name }}</p>
                    <p><strong>Status: </strong>{{ $city->status }}</p>
                    <p><strong>Estado:</strong>{{ $state->name }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
