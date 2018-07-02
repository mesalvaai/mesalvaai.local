@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Estados</strong>
                    <a href="{{ route('states.create') }}" class="btn btn-outline-info btn-sm float-right">Novo Estado</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Sigla</th>
                                    <th>Slug</th>
                                     <th>Status</th>
                                     <th>ID País</th>
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->id }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->sigla }}</td>
                                        <td>{{ $state->slug }}</td>
                                        <td>{{ $state->status }}</td>
                                        <td>{{ $state->country_id }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('states.show', $state->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                            <a href="{{ route('states.edit', $state->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                            {!! Form::open(['route' => ['states.destroy', $state->id] , 'method' => 'DELETE']) !!}
                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
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
</div>
@endsection
