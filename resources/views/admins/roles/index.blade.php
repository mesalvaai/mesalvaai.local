@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles
                    @can('roles.create', Model::class)
                        <a href="{{ route('roles.create') }}" title="Cadastrar roles" class="btn btn-outline-info btn-sm w-25 float-right">Novo Rol</a>
                    @endcan
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Descrição</th>
                                <th scope="col" colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        @can('roles.show', Model::class)
                                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-success btn-sm">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('roles.edit', Model::class)
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-info btn-sm">Alterar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('roles.destroy', Model::class)
                                            {!! Form::open(['route' => ['roles.destroy', $role->id] , 'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
