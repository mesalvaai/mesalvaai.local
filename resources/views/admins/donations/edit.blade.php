@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Doação</strong>
                    <a href="{{ route('donations.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif

                        {!! Form::model($donation, ['route' => ['donations.update', $donation->id], 'method' => 'PUT']) !!}

                        @include('admins.donations.partials.form')

                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection