@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
         Edite sua campanha
         <a href="{{ route('campaigns.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
       </div>

       <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
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
