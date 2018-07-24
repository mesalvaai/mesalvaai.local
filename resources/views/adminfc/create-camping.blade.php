
@extends('layouts.site.appfc')
 
@section('content')

{{-- <section id="painel-fc" class="painel-fc">
    <div class="painel-fc-bg">
        <div class="container text-center">
            <h1 class="text-white">CRIAR SUA CAMPANHA</h1>
        </div>
    </div>
</section> --}}

<section class="painel-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-msa">Criar Campanha {{ session()->get('student_id') }}</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        @endif
                        
                         {{-- @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        
                        
                        {{ Form::open(['route' => 'store.camping', 'enctype' => 'multipart/form-data', 'novalidate']) }}
                            @include('adminfc.partials.form-camping')
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