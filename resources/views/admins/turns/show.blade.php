@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <strong>Turns</strong>
                    <a href="{{ route('turns.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><strong>Id: </strong>{{ $turn->id }}</p>
                    <p><strong>Nome: </strong>{{ $turn->name }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
