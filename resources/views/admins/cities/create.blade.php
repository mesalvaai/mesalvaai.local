@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Cidades</strong>
                    <a href="{{ route('cities.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif

                        {!! Form::open(['route' => 'cities.store']) !!}

                        <div class="form-group">
                          {!! Form::label('state_id', 'Estado') !!}
                          {!! Form::select('state_id', $selectStates, null, ['class' => 'form-control']); !!}
                      </div>

                      @include('admins.cities.partials.form')

                      {{ Form::close() }}

                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection
