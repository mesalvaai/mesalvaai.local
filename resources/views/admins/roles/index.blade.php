@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
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
                                        <td class="float-right">
                                            @can('roles.show', Model::class)
                                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i></a>
                                            @endcan
                                        </td>
                                        <td class="float-right">
                                            @can('roles.edit', Model::class)
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>
                                        <td class="float-right">
                                            @can('roles.destroy', Model::class)
                                                {!! Form::open(['route' => ['roles.destroy', $role->id] , 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div class="table-responsive">

                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
