@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Níveis</strong>
                    <a href="{{ route('levels.create') }}" class="btn btn-outline-info btn-sm float-right">Novo Nível</a>
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
                                    <th>Id</th>
                                    <th>Nome</th>
                                    
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{ $level->id }}</td>
                                        <td>{{ $level->name }}</td>
                                        
                                        <td class="float-right">
                                            <a href="{{ route('levels.show', $level->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                                <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                                {!! Form::open(['route' => ['levels.destroy', $level->id] , 'method' => 'DELETE']) !!}
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
