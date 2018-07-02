@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>País - </strong>
                    <strong>{{$country->name}}</strong>
                    <a href="{{ route('countries.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <p><strong>ID: </strong>{{ $country->id }}</p>
                    <p><strong>Nome: </strong>{{ $country->name }}</p>
                    <p><strong>Slug: </strong>{{ $country->slug }}</p>
                    <p><strong>Status: </strong>{{ $country->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
