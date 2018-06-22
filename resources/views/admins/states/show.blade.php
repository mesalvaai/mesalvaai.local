@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Estado - </strong>
                    <strong>{{$state->name}}</strong>
                    <a href="{{ route('states.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <p><strong>ID: </strong>{{ $state->id }}</p>
                    <p><strong>Nome: </strong>{{ $state->name }}</p>
                     <p><strong>Sigla: </strong>{{ $state->sigla }}</p>
                    <p><strong>Slug: </strong>{{ $state->slug }}</p>
                    <p><strong>Status: </strong>{{ $state->status }}</p>
                     <p><strong>País: </strong>{{ $country->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
