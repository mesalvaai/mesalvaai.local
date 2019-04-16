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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        {{ Form::model($turn, ['route' => ['turns.update', $turn->id], 'method' => 'PUT']) }}
                        @include('admins.turns.partials.form')
                        {{ Form::close() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
