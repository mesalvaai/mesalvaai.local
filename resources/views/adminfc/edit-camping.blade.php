
@extends('layouts.site.appfc')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<section class="painel-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-msa">ALTERAR CAMPANHA </strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                            @endif
                            
                            {!! Form::model($campaign, ['route' => ['update.camping', $campaign->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                @include('adminfc.partials.edit-camping')
                            {{ Form::close() }}

                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    @endsection

    @section('scripts')
    <script>
        $('.custom-file-input').on('change', function() { 
         let fileName = $(this).val().split('\\').pop(); 
         $(this).next('.custom-file-label').addClass("selected").html(fileName); 
     });
 </script>
 @endsection