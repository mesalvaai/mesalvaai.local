@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Instituição</strong>
                    <a href="{{ route('institutions.create') }}" class="btn btn-outline-info btn-sm float-right">Nova Instituição</a>
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
                                    <th>CNPJ</th>
                                    <th>CEP</th>
                                   
                                    <th>Telefone</th>
                                    <th>Slug</th>
                                    <th>Estado</th>
                                    <th>Cidade</th>
                                    <th>Rua</th>
                                    <th>Número</th>
                                    <th>Bairro</th>
                                    <th>Complemento</th> 
                                    <th>Handbag</th> 
                                    <th>Logo</th> 
                                    <th>Evaluation</th> 
                                    <th>Descrição</th> 
                                     <th>Status</th>
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutions as $institutions)
                                    <tr>
                                        <td>{{ $institutions->id }}</td>
                                        <td>{{ $institutions->name }}</td>
                                        <td>{{ $institutions->cpnj }}</td>
                                        <td>{{ $institutions->cpe }}</td>
                                     
                                        <td>{{ $institutions->phone }}</td>
                                        <td>{{ $institutions->slug }}</td>
                                        <td>{{ $institutions->state->name }}</td>
                                        <td>{{ $institutions->city->name }}</td>
                                        <td>{{ $institutions->street }}</td>
                                        <td>{{ $institutions->number }}</td>
                                        <td>{{ $institutions->neighborhood }}</td>
                                        <td>{{ $institutions->complement }}</td> 
                                        <td>{{ $institutions->handbag }}</td> 
                                        <td>{{ $institutions-logo }}</td> 
                                        <td>{{ $institutions->evaluation }}</td> 
                                        <td>{{ $institutions->description }}</td> 
                                         <td>{{ $institutions->status }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('institutions.show', $institutions->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                                <a href="{{ route('institutions.edit', $institutions->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                                {!! Form::open(['route' => ['institutions.destroy', $institutions->id] , 'method' => 'DELETE']) !!}
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
