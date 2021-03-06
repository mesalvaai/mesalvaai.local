@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Estudantes</strong>
                    <a href="{{ route('students.create') }}" class="btn btn-outline-info btn-sm float-right">Novo Estudante</a>
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
                                    <th>CPF</th>
                                    <th>Email</th>
                                    {{-- <th>Data de Nascimento</th> --}}
                                    <th>Telefone</th>
                                    {{-- <th>CEP</th>
                                    <th>Estado</th>
                                    <th>Cidade</th>
                                    <th>Rua</th>
                                    <th>Número</th>
                                    <th>Bairro</th>
                                    <th>Complemento</th> --}}
                                     <th>Status</th>
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->cpf }}</td>
                                        <td>{{ $student->email }}</td>
                                        {{-- <td>{{ $student->data_of_birth }}</td> --}}
                                        <td>{{ $student->phone }}</td>
                                        {{-- <td>{{ $student->cep }}</td>
                                        <td>{{ $student->state->name }}</td>
                                        <td>{{ $student->city->name }}</td>
                                        <td>{{ $student->street }}</td>
                                        <td>{{ $student->number }}</td>
                                        <td>{{ $student->neighborhood }}</td>
                                        <td>{{ $student->complement }}</td> --}}
                                         <td>{{ $student->status }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                                {!! Form::open(['route' => ['students.destroy', $student->id] , 'method' => 'DELETE']) !!}
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
