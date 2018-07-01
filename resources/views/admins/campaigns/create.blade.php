@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Campanhas
                    <a href="{{ route('campaigns.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    {!! Form::open(['route' => 'campaigns.store']) !!}

                    @include('admins.campaigns.partials.form', ['some' => 'data'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    @endsection
