@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Turns</strong>
                    <a href="{{ route('turns.create') }}" class="btn btn-outline-info btn-sm float-right">Novo Turn</a>
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
                                @foreach ($turns as $turn)
                                    <tr>
                                        <td>{{ $turn->id }}</td>
                                        <td>{{ $turn->name }}</td>
                                        
                                        <td class="float-right">
                                            <a href="{{ route('turns.show', $turn->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                                <a href="{{ route('turns.edit', $turn->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                                {!! Form::open(['route' => ['turns.destroy', $turn->id] , 'method' => 'DELETE']) !!}
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
