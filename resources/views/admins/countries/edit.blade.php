@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Países</strong>
                    <a href="{{ route('countries.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        
                        {!! Form::model($country, ['route' => ['countries.update', $country->id], 'method' => 'PUT']) !!}
                        @include('admins.countries.partials.form')
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
