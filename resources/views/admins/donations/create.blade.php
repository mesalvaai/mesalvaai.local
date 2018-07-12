@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Doação
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
                    
<<<<<<< HEAD
                    {!! Form::open(['route' => 'donations.store']) !!}
=======
                    {!! Form::open(['route' => ['donations.store', $reward->id]]) !!}
>>>>>>> 0ae3c23096ea6432cf9e357590306b60c7da0d78

                    @include('admins.donations.partials.form', ['some' => 'data'])
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection