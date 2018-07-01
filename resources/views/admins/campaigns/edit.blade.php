@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
         Edite sua campanha
         <a href="{{ route('campaigns.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
       </div>

       <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </div>
          @endif

          {!! Form::model($campaign, ['route' => ['campaigns.update', $campaign->id], 'method' => 'PUT']) !!}

          @include('admins.campaigns.partials.form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
