@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Estados</strong>
                    <a href="{{ route('states.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        
                        {!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'PUT']) !!}

                        {{-- <div class="form-group">
                          {!! Form::label('country_id', 'País') !!}
                          {!! Form::select('country_id', $selectCountries,null,['class'=>'form-control']); !!}
                      </div> --}}

                      @include('admins.states.partials.form')
                      {{ Form::close() }}

                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection
