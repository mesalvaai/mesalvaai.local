@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
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
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
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
                                        
                                        <td class="float-right">
                                            @can('permissions.destroy', Model::class)
                                                {!! Form::open(['route' => ['permissions.destroy', $role->id] , 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>

                                        <td class="float-right">
                                            @can('permissions.edit', Model::class)
                                                <a href="{{ route('permissions.edit', $role->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>

                                        <td class="float-right">
                                            @can('permissions.show', Model::class)
                                                <a href="{{ route('permissions.show', $role->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $permissions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
