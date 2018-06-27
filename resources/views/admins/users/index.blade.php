@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    @can('users.create', Model::class)
                        <a href="#" title="Cadastrar Produto" class="btn btn-outline-info btn-sm w-25 float-right">Novo Usuario</a>
                    @endcan
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col" colspan="3" class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="float-right">
                                            @can('users.show', Model::class)
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i></a>
                                            @endcan
                                        </td>
                                        <td class="float-right">
                                            @can('users.edit', Model::class)
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>
                                        <td class="float-right">
                                            @can('users.destroy', Model::class)
                                                {!! Form::open(['route' => ['users.destroy', $user->id] , 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
