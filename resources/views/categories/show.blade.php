@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Categorias</strong>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Categoria: </strong>{{ $category->name }}</p>
                    <p><strong>Descrição: </strong>{{ $category->name }}</p>
                    <p><strong>Status: </strong>{{ ($category->status == 1) ? 'Ativo' : 'Inativo' }}</p>

                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
