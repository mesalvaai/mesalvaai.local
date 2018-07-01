@extends('layouts.painel.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Permisos
                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Nome: </strong>{{ $permission->name }}</p>
                    <p><strong>Slug: </strong>{{ $permission->slug }}</p>
                    <p><strong>Descrição: </strong>{{ $permission->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection