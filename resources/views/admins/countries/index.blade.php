@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Países</strong>
                    <a href="{{ route('countries.create') }}" class="btn btn-outline-info btn-sm float-right">Novo país</a>
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
                                    <th>Slug</th>
                                     <th>Status</th>
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->slug }}</td>
                                     <td>{{ $country->status }}</td>
                                    <td>
                                        <a href="{{ route('countries.show', $country->id) }}" class="btn btn-outline-info btn-sm">Ver</a>

                                        <td>
                                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-outline-success btn-sm">Alterar</a>
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['countries.destroy', $country->id] , 'method' => 'DELETE']) !!}
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
