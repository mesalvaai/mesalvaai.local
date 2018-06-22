@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                        <table class="table table-striped table-bordered">
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
                                    <td>
                                        <a href="{{ route('states.show', $state->id) }}" class="btn btn-outline-info btn-sm">Ver</a>

                                        <td>
                                            <a href="{{ route('states.edit', $state->id) }}" class="btn btn-outline-success btn-sm">Alterar</a>
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['states.destroy', $state->id] , 'method' => 'DELETE']) !!}
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
