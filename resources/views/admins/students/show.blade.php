@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <strong>Estudantes</strong>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $student->id }}</p>
                    <p><strong>Nome: </strong>{{ $student->name }}</p>
                    <p><strong>CPF: </strong>{{ $student->cpf }}</p>
                    <p><strong>Data de Nascimento: </strong>{{ $student->data_of_birth }}</p>
                    <p><strong>Telefone: </strong>{{ $student->phone }}</p>
                    <p><strong>CEP: </strong>{{ $student->cep }}</p>
                    <p><strong>Estado: </strong>{{ $student->state->name }}</p>
                    <p><strong>Cidade: </strong>{{ $student->city->name }}</p>
                    <p><strong>Rua: </strong>{{ $student->street }}</p>
                    <p><strong>Número: </strong>{{ $student->number }}</p>
                    <p><strong>Bairro: </strong>{{ $student->neighborhood }}</p>
                    <p><strong>Complemento: </strong>{{ $student->complement }}</p>
                    <p><strong>Status: </strong>{{ ($student->status == 1) ? 'Ativo' : 'Inativo' }}</p>

                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
