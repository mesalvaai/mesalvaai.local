@extends('layouts.painel.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produto</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Nome: </strong>{{ $role->name }}</p>
                    <p><strong>Slug: </strong>{{ $role->slug }}</p>
                    <p><strong>Descrição: </strong>{{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection