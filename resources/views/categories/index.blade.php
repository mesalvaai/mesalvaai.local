@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Categorias</strong>
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-info btn-sm float-right">Nova categoria</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ ($category->status == 1) ? 'Ativo' : 'Inativo' }}</td>
                                    <td>
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                                    
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-success btn-sm">Alterar</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['categories.destroy', $category->id] , 'method' => 'DELETE']) !!}
                                            <button class="btn btn-outline-danger btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
