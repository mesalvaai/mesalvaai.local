@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('content')
    <div class="container pt-4 pb-4">
        <h1>test</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>
@endsection