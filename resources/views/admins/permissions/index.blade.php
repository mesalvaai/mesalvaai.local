@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Permisos
                    @can('permissions.create', Model::class)
                        <a href="{{ route('permissions.create') }}" title="Cadastrar permissions" class="btn btn-outline-info btn-sm w-25 float-right">Novo Permiso</a>
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
                                <th scope="col" colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        @can('permissions.show', Model::class)
                                            <a href="{{ route('permissions.show', $role->id) }}" class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('permissions.edit', Model::class)
                                            <a href="{{ route('permissions.edit', $role->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('permissions.destroy', Model::class)
                                            {!! Form::open(['route' => ['permissions.destroy', $role->id] , 'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $permissions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
