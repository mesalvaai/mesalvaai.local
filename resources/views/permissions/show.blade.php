@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Permisos</div>

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